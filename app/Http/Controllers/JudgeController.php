<?php namespace Contest\Http\Controllers;

use Contest\Http\Controllers\Helpers\EntryHelper;
use Contest\Http\Controllers\Helpers\JudgeHelper;
use Contest\Http\Requests;
use Contest\Judge;
use Contest\User;
use Illuminate\Support\Facades\Mail;

class JudgeController extends Controller {

	const PUBLISHED = true;
	const UNPUBLISHED = false;
	protected $isCoordinator = false;
	protected $isAdmin = false;
	public $judgeUserID;
	public $judge;

	use JudgeHelper;
	use EntryHelper;

	public function isJudge() {
		return ( count( $this->judge ) );
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
		$this->judgeUserID = \Auth::id();
		$this->judge = Judge::where( 'user_id', '=', $this->judgeUserID )->first();
		if ( \Auth::user()->isAdministrator() ) {
			$this->isAdmin = true;
			$this->isCoordinator = true;
		}


	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return view( 'judge.index', array( 'isJudge' => $this->isJudge(), 'judge' => $this->judge, 'isCoordinator' => $this->isCoordinator, 'isAdmin' => $this->isAdmin ) );
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
		$judge = new Judge;
		// set defaults
		$judge->user_id = $this->judgeUserID;
		$judge->judgePub = 1;
		$judge->judgeUnpub = 1;
		$judge->judgeEitherNotBoth = 0;
		$judge->maxpubentries = 5;
		$judge->maxunpubentries = 6;
		$judge->mainstream = 3;
		$judge->category = 3;
		$judge->historical = 3;
		$judge->singleTitle = 3;
		$judge->paranormal = 3;
		$judge->inspirational = 3;
		$judge->erotic = 1;
		$judge->glbt = 1;
		$judge->bdsm = 1;
		$judge->vampires = 1;
		$judge->religious = 1;

		return view( 'judge.create', $this->judgeFormData( $judge ) );
//        return view('judge.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store( Requests\JudgeRequest $request ) {
		$judge = new Judge;
		// set defaults
		$judge->user_id = $this->judgeUserID;
		$this->fillInFields( $request, $judge );
		$judge->save();
		if ( $this->isCoordinator ) {
			return redirect( '/coordinators/judges' );
		} else {
			$this->sendConfirmation( $judge );
		}
		return redirect( 'judges' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show( $id ) {
		//      dd($data);
		//
		$judge = Judge::find( $id );
		return view( 'judge.show', $this->judgeFormData( $judge ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function edit( $id ) {
		//
		$judge = Judge::find( $id );
		return view( 'judge.edit', $this->judgeFormData( $judge ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update( Requests\JudgeRequest $request, $id ) {
		//
		$judge = Judge::find( $id );
		$this->fillInFields( $request, $judge );
		$judge->save();
		if ( $this->isCoordinator ) {
			return redirect( '/coordinators/judges' );
		} else {
			$this->sendConfirmation( $judge );
		}
		return redirect( 'judges' );
	}

	/**
	 * @param Requests\JudgeRequest $request
	 * @param $judge
	 */
	public function fillInFields( Requests\JudgeRequest $request, $judge ) {
		$judge->judgePub = $request->judgePub;
		$judge->judgeUnpub = $request->judgeUnpub;
		$judge->judgeEitherNotBoth = $request->judgeEitherNotBoth;
		$judge->judgeThisYear = $request->judgeThisYear;
		$judge->maxpubentries = $request->maxpubentries;
		$judge->maxunpubentries = $request->maxunpubentries;
		$judge->mainstream = $request->mainstream;
		$judge->category = $request->category;
		$judge->historical = $request->historical;
		$judge->singleTitle = $request->singleTitle;
		$judge->paranormal = $request->paranormal;
		$judge->inspirational = $request->inspirational;
		$judge->erotic = $request->erotic;
		$judge->glbt = $request->glbt;
		$judge->bdsm = $request->bdsm;
		$judge->vampires = $request->vampires;
		$judge->religious = $request->religious;
		$judge->comments = $request->comments;
		if ( $request->has( 'internalComments' ) ) {
			$judge->internalComments = $request->internalComments;
		}
	}

	public function sendConfirmation( $judge ) {
		$templateToUse = 'judge.emails.confirm';
		$user = User::find( $judge->user_id );
		$ccEmails = Array();
		$ccEmails[ ] = $this->getAdminEmail( 'JC' );
		$ccEmails[ ] = $this->getAdminEmail( 'OC' );
		$ccEmails[ ] = [ 'email' => 'doug@asknice.com', 'name' => 'Webmaster' ];

		Mail::send( $templateToUse, $this->judgeFormData( $judge ), function ( $message ) use ( $user, $ccEmails ) {
			$message->to( $user->email, $user->writingName )->subject( 'Daphne Judging Preference Update Confirmation ' . $user->writingName );
			foreach ( $ccEmails as $email ) {
				$message->cc( $email[ 'email' ], $email[ 'name' ] );
			}

		} );

	}

	public function coordinatorShow( $id ) {
		$this->isCoordinator = true;
		return $this->show( $id );
	}

	public function coordinatorEdit( $id ) {
		$this->isCoordinator = true;
		return $this->edit( $id );
	}

}
