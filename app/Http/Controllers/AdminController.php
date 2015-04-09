<?php namespace Contest\Http\Controllers;

use Contest\Entry;
use Contest\Http\Controllers\Helpers\ScoresheetHelper;
use Contest\Http\Requests;
use Contest\Http\Controllers\Helpers\EntryHelper;
use Contest\Judge;
use Contest\Scoresheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller {

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

	public function index() {
		$categoryCounts = $this->getCategoryCountsByCoordinator( $this->adminPerson );
		return view( 'admin.index', [ 'isAdmin' => $this->isAdmin, 'categoryCounts' => $categoryCounts ] );

	}

	public function entries() {

		$entries = Entry::whereRaw( $this->getRolesWhereClause( $this->adminPerson ) )->orderBy( 'category' )->orderBy( 'published' )->get();

		return view( 'admin.entry.entries', array( 'entries' => $entries, 'isCoordinator' => true ) );


	}

	public function judgesList() {

		//todo: Make this work with roles  $judges = Judge::whereRaw($this->getRolesWhereClause($this->adminPerson))->orderBy('category')->orderBy('published')->get();
//        $judges = Judge::with('user')
//            ->join('users', 'users.id', '=', 'judges.user_id')
//            ->orderBy('judgeThisYear')
//            ->orderBy('users.lastName')
//            ->get();
		$judges = Judge::all();
		$judges = $judges->sortBy( function ( $judge ) {
			return strtoupper( ( $judge->judgeThisYear ? $judge->judgeThisYear : 'AA' ) . $judge->user->lastName );
		} );
		return view( 'admin.judge.judges', array( 'judges' => $judges, 'isCoordinator' => true ) );


	}

	public function scoresheetsList( $action = '' ) {
		$assign = ( $action == 'assign' );
		if ( $assign ) {

			$scoresheets = Scoresheet::all();
			$scoresheets = $scoresheets->sortBy( function ( $scoresheet ) {
				return strtoupper( ( $scoresheet->published ? 'P' : 'U' ) . $scoresheet->category . $scoresheet->title );
			} );
			return view( 'admin.scoresheets.scoresheets', array( 'scoresheets' => $scoresheets, 'categories' => $this->categories(), 'isCoordinator' => true, 'assign' => $assign ) );
		} else {
			$scoresheets = Scoresheet::whereRaw( $this->getRolesWhereClause( $this->adminPerson ) )->orderBy( 'category' )->orderBy( 'published' )->orderBy( 'title' )->get();
			$scoresheets->load( 'judge' );
			return view( 'admin.scoresheets.scoresheets', array( 'scoresheets' => $scoresheets, 'categories' => $this->categories(), 'isCoordinator' => true, 'assign' => $assign ) );

		}


	}

	private function convertValue( $choice ) {
		if ( $choice == 4 ) {
			return 'T';
		} else {
			if ( $choice == 3 ) {
				return 'L';
			} else {
				return '';
			}
		}
	}

	public function returnCSV( $CSVType = '' ) {
		//use if don't need fields from user except for sorting
		$judges = Judge::with( 'user' )
			->join( 'users', 'users.id', '=', 'judges.user_id' )
			->where( 'judges.judgeThisYear', '=', 'LJ' )
			->orWhere( 'judges.judgeThisYear', '=', 'EJ' )
			->orderBy( 'users.lastName' )
			->select( 'judges.*' )
			->get();

		//alternative way to pull, will probably give access to user object but slower
//        $judges = Judge::with('User')
//            ->where('judgeThisYear','=','LJ')
//            ->orWhere('judgeThisYear','=','EJ')
//            ->get()
//            ->sortBy('User.lastName');

		// the csv file with the first row
		$output = implode( ",", array( 'Judge ID', 'Profile ID', 'Judge name', 'This Year', 'Pub', 'Pub Max', 'Unpub', 'Unpub Max', 'ENB', 'MA', 'CA', 'HI', 'ST', 'PA', 'IN' ) );

		foreach ( $judges as $row ) {
			// iterate over each tweet and add it to the csv
			if ( strtolower( $CSVType ) == 'favorite' ) {
				$title = 'judgefaves.csv';
				$output .= "\r" . implode( ",", array( $row->id, $row->user_id, $row->judgeName(), $row->judgeThisYear, ( $row->judgePub ? 'yes' : 'no' ),
													   $row->maxpubentries, ( $row->judgeUnpub ? 'yes' : 'no' ), $row->maxunpubentries, ( $row->judgeEitherNotBoth ? 'yes' : 'no' ), $this->convertValue( $row->mainstream ),
													   $this->convertValue( $row->category ), $this->convertValue( $row->historical ), $this->convertValue( $row->singleTitle ),
													   $this->convertValue( $row->paranormal ), $this->convertValue( $row->inspirational ) ) ); // append each row

			} else {
				$title = 'judges.csv';
				$output .= "\r" . implode( ",", array( $row->id, $row->user_id, $row->judgeName(), $row->judgeThisYear, ( $row->judgePub ? 'yes' : 'no' ),
													   $row->maxpubentries, ( $row->judgeUnpub ? 'yes' : 'no' ), $row->maxunpubentries, ( $row->judgeEitherNotBoth ? 'yes' : 'no' ), $row->mainstream,
													   $row->category, $row->historical, $row->singleTitle, $row->paranormal, $row->inspirational ) ); // append each row

			}
		}

		// headers used to make the file "downloadable", we set them manually
		// since we can't use Laravel's Response::download() function
		$headers = array(
			'Content-Type' => 'text/csv',
			'Content-Disposition' => 'attachment; filename="' . $title . '"',
		);

		// our response, this will be equivalent to your download() but
		// without using a local file
		return Response::make( rtrim( $output, "\n" ), 200, $headers );

	}

	public function jsonDownload() {

		$scoresheets = Scoresheet::get( [ 'id', 'title', 'judge_id', 'category', 'published' ] );
		$scoresheets = $scoresheets->sortBy( function ( $scoresheet ) {
			return strtoupper( ( $scoresheet->published ? 'P' : 'U' ) . $scoresheet->category . $scoresheet->title );
		} );
		$returns = array();
		foreach ( $scoresheets as $key => $scoresheet ) {
			$returns[ ] = $scoresheet;
		}
		return Response::json( $returns );

	}

	public function jsonUpload( Request $request ) {

		$data = $request->all();
		if ( $request->ajax() ) {
			$id = $request->get( 'id' );
			$judge_id = $request->get( 'judgeID' );
			$scoresheet = Scoresheet::find( $id );
			$scoresheet->judge_id = $judge_id;
			$scoresheet->update();
		}
	}

	public function scoresheetSummary() {
		$scoreResults = DB::table( 'scoresheets' )
			->select( DB::raw( 'SUM(finalScore) as totalScore,
		MIN(finalScore) as totalScoreMinus,
		SUM(tieBreaker) as totalRanking,
		MIN(tiebreaker) as totalRankingMinus,
		SUM(finalScore)-MIN(finalScore) as totalFinal,
		category,published,entry_id as entryNumber' ) )
			->where('completed','=',true)
			->groupBy( 'published' )
			->groupBy( 'category' )
			->groupBy( 'entry_id' )
			->orderBy('published')
			->orderBy('category')
			->orderBy('totalFinal')
			->get();
		$scoresheets = Scoresheet::all();

		return view( 'reports.scoresummary', [ 'scoreResults' => $scoreResults, 'scoresheets' => $scoresheets ] );
	}

}
