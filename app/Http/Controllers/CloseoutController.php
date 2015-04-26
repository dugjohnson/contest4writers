<?php namespace Contest\Http\Controllers;

use Contest\Http\Requests;
use Contest\Http\Controllers\Helpers\ScoresheetHelper;
use Contest\Http\Controllers\Helpers\EntryHelper;
use Contest\Http\Controllers\Controller;
use Contest\Entry;
use Contest\Judge;
use Contest\Scoresheet;
use Contest\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class CloseoutController extends Controller {
	protected $adminPerson;
	protected $isAdmin;
	protected $closeoutType = [
		'unpubnonfinal' => 'Unpublished Non-Finalist',
		'pubnonfinal' => 'Published Non-Finalist',
		'unpubfinal' => 'Unpublished Finalist',
		'pubfinal' => 'Published Finalist'
	];
	use EntryHelper;
	use ScoresheetHelper;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
		$this->adminPerson = \Auth::user();
		if ( !( $this->adminPerson && $this->adminPerson->isCoordinator() ) ) {
			return redirect( '/home' );
		}
		$this->isAdmin = $this->adminPerson->isAdministrator();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		//
		return view( 'admin.closeout.index' );
	}

	public function emailGo( $type ) {
		switch ( $type ) {
			case 'unpubnonfinal':
				$published = 0;
				$finalist = 0;
				break;
			case 'pubnonfinal':
				$published = 1;
				$finalist = 0;
				break;
			case 'unpubfinal':
				$published = 0;
				$finalist = 1;
				break;
			case 'pubfinal':
				$published = 1;
				$finalist = 1;
				break;
			default:
				return 'Invalid email type ' . $type;

		}
		$entries = Entry::with('scoresheets')
		    ->where( 'published', '=', $published )
			->where( 'finalist', '=', $finalist )
			->get();
		foreach ( $entries as $entry ) {
			$this->sendScores( $entry, $type );
		}
		return 'Done - sent out scoresheets for '.$entries->count().' entries.  <a href="/">Back to home page</a>';
	}

	public function email( $type ) {
		//this is the warning/cancel view
		return view( 'admin.closeout.email', [ 'type' => $type, 'description' => $this->closeoutType[ $type ] ] );

	}

	public function sendScores( $entry, $type ) {
		$templateToUse = 'admin.closeout.emails.emailbody';
		$user = User::find( $entry->user_id );
		$ccEmails = Array();
		$ccEmails[ ] = $this->getAdminEmail( 'JC' );
		$ccEmails[ ] = $this->getAdminEmail( 'OC' );
//		$ccEmails[ ] = $this->getAdminEmail( $entry->category, $entry->published );
		$ccEmails[ ] = [ 'email' => 'doug@asknice.com', 'name' => 'Webmaster' ];
		$labelList = $this->getLabelList($entry->category, $entry->published);
		$tieBreakerList = $this->tieBreakerList($entry->published);
		foreach($entry->scoresheets as $scoresheet){
			$scoresheet->sheet = $scoresheet->getScoresheetData()->sheet;
		}

		Mail::send( $templateToUse, array( 'user' => $user,
										   'entry' => $entry,
										   'type' => $type,
										   'coordinator'=>'Brooke Wills',
										   'label' => $labelList,
										   'tieBreakerList' => $tieBreakerList,
										   'categories' => $this->categories()), function ( $message ) use ( $entry, $user, $ccEmails, $type ) {
//			$message->to( $user->email, $user->writingName )->subject( 'The Score Sheets for Your Daphne entry ' . $entry->title );
			$message->to( 'doug@asknice.com' , 'doug='.$user->writingName )->subject( 'The Score Sheets for Your Daphne entry ' . $entry->title );
			foreach ( $ccEmails as $email ) {
				$message->cc( $email[ 'email' ], $email[ 'name' ] );
			}

		} );

	}
}
