<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;

class WorkerController extends Controller
{

    public $objWorker;
    public function __construct()
    {
        $this->objWorker = New Worker();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = $this->objWorker->allWorkers();

      //dd($workers);

        return view('greed_workers',compact('workers'));
    }

    public function workers_list()
    {
        $workers = $this->objWorker->allInfoWorkers();
    //dd($workers);
        return view('list_worker',compact('workers'));
    }


    public function searchInfoWorkers(Request $request)
    {
        $this->validate($request,
            ['string' => 'required',
             'select' => 'required']);

        $workers = $this->objWorker->searchInfoWorkers($request->string,$request->select);

     //  dd($workers);

        return $workers;
    }

    public function sortInfoWorkers(Request $request)
    {
        $this->validate($request, ['column' => 'required', 'sequence' => 'required']);

        $workers = $this->objWorker->sortInfoWorkers($request->column,$request->sequence);



        return $workers;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
