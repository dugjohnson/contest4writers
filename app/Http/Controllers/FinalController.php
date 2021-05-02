<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use App\Http\Requests;


class FinalController extends Controller
{

    protected $isCoordinator = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
