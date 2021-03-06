<?php namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\EntryHelper;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class ReportsController extends KODController
{
    use EntryHelper;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        if (! $this->isAdministrator) {
            return redirect('home');
        }
        $categoryCounts = $this->getCategoryCounts();
        return view('reports.index', ['categoryCounts' => $categoryCounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
