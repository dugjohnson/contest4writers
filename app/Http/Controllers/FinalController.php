<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\FinalScoresheet;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Helpers\EntryHelper;


class FinalController extends Controller
{
    use EntryHelper;

    protected $isCoordinator = false;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lookup_code = '')
    {
        $finalsheet = FinalScoresheet::where('lookup_code', '=', $lookup_code)->first();
        return view('scoresheets.finalist.editfinal', ['finalsheet' => $finalsheet, 'categories' => $this->categories()]);
    }

    public function postUpload(Requests\UploadFileRequest $request, $id)
    {
        if (1 == $request->isCoordinator) {
            $this->isCoordinator = true;
        }
        $entry = Entry::find($id);
        $filename = $entry->final_filename;
        if (empty($filename)) {

            $filename = date('ymdHis') . mt_rand(1000, 9999) . '.pdf';
            $entry->final_filename = $filename;
            $entry->save();

        }

        $destination = $_SERVER["DOCUMENT_ROOT"] . '/uploads/entries/';
        if (file_exists($destination . $filename)) {
            unlink($destination . $filename);
        }
        $request->file('filename')->move($destination, $filename);

        if ($this->isCoordinator) {
            header('Location: /coordinators/entries');
        } else {
            header('Location: /entries');
        }
        exit;
    }

    public function getUpload($id)
    {
        $entry = Entry::find($id);
        return view('entry.uploadfinal', array('entry' => $entry, 'isCoordinator' => $this->isCoordinator));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($lookup_code = '')
    {
        $finalsheet = FinalScoresheet::where('lookup_code', '=', $lookup_code)->first();
        return view('scoresheets.finalist.showfinal', ['finalsheet' => $finalsheet, 'categories' => $this->categories()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lookup_code)
    {
        $finalsheet = FinalScoresheet::where('lookup_code', '=', $lookup_code)->first();
        $finalsheet->comments = $request->input('comments');
        $finalsheet->standout = $request->input('standout');
        $finalsheet->improve = $request->input('improve');
        $finalsheet->assessment = $request->input('assessment');
        $finalsheet->score = $request->input('score');
        $finalsheet->rank = $request->input('rank');
        $finalsheet->synopsis = empty($request->input('synopsis'))?false:true;
        $finalsheet->full_manuscript = empty($request->input('full_manuscript'))?false:true;
        $finalsheet->other = empty($request->input('other'))?false:true;
        $finalsheet->signature = $request->input('signature');
        $finalsheet->save();
        return redirect('/scoresheets/final/'.$lookup_code.'/show');
    }

    // creates 5 score sheets for each finalist
    public function makesheets()
    {
        $finalists = Entry::query()
            ->where('finalist', '=', true)
            ->where('published', '=', false)
            ->get();
        foreach ($finalists as $final) {
            for ($i = 0; $i < 5; $i++) {
                $final_score = new FinalScoresheet();
                $final_score->lookup_code = $this->generateRandomString();
                $final_score->entry_id = $final->id;
                $final_score->published = false;
                $final_score->category = $final->category;
                $final_score->title = $final->title;
                if ('LO' == $final->category) {
                    $final->final_judge_id = $i + 1;
                } else {
                    $final->final_judge_id = $i + 6;
                }
                $final_score->save();
            }
        }
    }

    private function generateRandomString($length = 6)
    {
        $characters = '23456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
