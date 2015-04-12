<?php namespace Contest\Http\Controllers;

use Contest\Http\Requests;
use Contest\Http\Controllers\Helpers\ScoresheetHelper;
use Contest\Http\Controllers\Helpers\EntryHelper;
use Contest\Http\Controllers\Controller;
use Contest\Entry;
use Contest\Judge;
use Contest\Scoresheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;


class CloseoutController extends Controller {
	protected $adminPerson;
	protected $isAdmin;
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

	public function email( $type ) {
		return view( 'admin.closeout.email', [ 'type' => $type ] );

	}

}
