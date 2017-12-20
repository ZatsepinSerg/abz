<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

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

        return view('greed_workers',compact('workers'));
    }

    public function workers_list()
    {
        $workers = $this->objWorker->allInfoWorkers();

        return view('list_worker',compact('workers'));
    }

    public function workers_list_ajax()
    {
        $workers = $this->objWorker->allInfoWorkers();

        return view('ajax.list_worker_ajax',compact('workers'))->render();
    }

    public function searchInfoWorkers(Request $request)
    {
        $this->validate($request,
            ['string' => 'required',
             'select' => 'required']);

        $workers = $this->objWorker->searchInfoWorkers($request->string,$request->select);

        return $workers;
    }

    public function searchAjaxInfoWorkers(Request $request)
    {
        $this->validate($request,
            ['string' => 'required',
             'select' => 'required']);

        $workers = $this->objWorker->searchInfoWorkers($request->string,$request->select);

        return view('ajax.list_worker_ajax',compact('workers'))->render();
    }


    public function sortInfoWorkers(Request $request)
    {

         $columnCook =  $request->cookie('column');
         $sequenceCook = $request->cookie('sequence');


        if(  $columnCook != $request->column && isset($request->column)) {
             Cookie::queue('column',$request->column,true,60);
             $column = $request->column;
        }else{
            $column = $columnCook;
        }

        if( $sequenceCook != $request->sequence && isset($request->sequence)) {

            Cookie::queue('sequence',$request->sequence,true,60);
            $sequence = $request->sequence;
        }else{
            $sequence = $sequenceCook;
        }



        $workers = $this->objWorker->sortInfoWorkers( $column,$sequence);

        return view('ajax.list_worker_ajax',compact('workers'))->render();
    }

    /*public function sortAjaxInfoWorkers(Request $request)
    {
        //$this->validate($request, ['column' => 'required', 'sequence' => 'required']);

        $column = $_COOKIE['column'];
        $sequence = $_COOKIE['sequence'];

        if( empty($columnCook) || (!empty($columnCook) && $columnCook != $request->column)) {
            setcookie('column', $request->column);

            $column = $request->column;
        }else{
            $column = $columnCook;
        }

        if( empty($sequenceCook) || (!empty($sequenceCook) && $sequenceCook != $request->sequence)) {
            setcookie('sequence', $request->sequence);

            $sequence = $request->sequence;
        }else{
            $sequence = $columnCook;
        }

        $workers = $this->objWorker->sortInfoWorkers($column,$sequence);

        return view('ajax.list_worker_ajax',compact('workers'))->render();
    }*/


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answer = FALSE;
        $time = time();

        $this->validate($request, [
            'name' => 'required|max:200',
            'surname' => 'required|max:200',
            'patronymic' => 'required|max:200',
            'boss' => 'required|max:200',
            'position' => 'required|max:200',
            'date_receipt' => 'date_format:"Y-m-d"|required',
            'salary' => 'integer|required',
            'file' =>'mimes:jpeg,bmp,png'
        ]);
if(!empty($request->file('file'))) {
    $photoWay = "images/photo/" . $time . "-" . $request->file('file')->getClientOriginalName();
    $request->file('file')->move(public_path() . '/images/photo/', $time . "-" . $request->file('file')->getClientOriginalName());

    $this->objWorker->name = $request->name;
    $this->objWorker->surname = $request->surname;
    $this->objWorker->patronymic = $request->patronymic;
    $this->objWorker->parent_id = $request->boss;
    $this->objWorker->position = $request->position;
    $this->objWorker->date_receipt = $request->date_receipt;
    $this->objWorker->salary = $request->salary;
    $this->objWorker->photo = $photoWay;

    $answer = $this->objWorker->save();
}

        if($answer){
            session()->flash('message','Сотрудник успешно добавлен!');

            return redirect()->home();
        }else{
            session()->flash('message','Произошла ошибка при добавлении нового сотрудника!');

            return redirect()->back();
        }

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
        $worker_info = $this->objWorker->InfoWorker($id);

        if($worker_info->parent_id !== 0 ) {
            $boss_info = $this->objWorker->bossInfo($worker_info->parent_id);
        }

        return view('edit',compact('worker_info','boss_info'));
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
        $time = time();

        $this->validate($request, [
            'id' => 'required|integer',
            'name' => 'required|max:200',
            'surname' => 'required|max:200',
            'patronymic' => 'required|max:200',
            'boss' => 'required|max:200',
            'position' => 'required|max:200',
            'date_receipt' => 'date_format:"Y-m-d"|required',
            'salary' => 'integer|required',
            'file' =>'mimes:jpeg,bmp,png'
        ]);

          if (!empty($request->file('file'))) {
              $oldImageWay = $this->objWorker->oldPhotoWay($id);
              Storage::delete($oldImageWay->photo);

              $photoWay = "images/photo/" .$time."-".$request->file('file')->getClientOriginalName();
              $request->file('file')->move(public_path() . '/images/photo/', $time ."-".$request->file('file')->getClientOriginalName());

              $answer = $this->objWorker->updateWorker($id,$request,$photoWay);

          }else {
              $answer = $this->objWorker->updateWorker($id,$request);
          }

              if ($answer) {
                    session()->flash('message', 'Данные сотрудника успешно обновлены!');
                } else {
                    session()->flash('message', 'Ошибка обновления данных сотрудника!');
                }
                return redirect('/workers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $subordinateWorkers = $this->objWorker->subordinate($id);

        $newBoss = $this->objWorker->newBoss($id);
        $newBoss = $newBoss->parent_id;

        if(!empty($newBoss)) {
            foreach ($subordinateWorkers as $worker) {
                $this->objWorker->updateBossInfo($worker->id, $newBoss);
            }
        }

        $imgWay =  $this->objWorker->oldPhotoWay($id);

        Storage::delete($imgWay->photo);

        $answer = $this->objWorker->deleteWorker($id);

        if ($answer) {
            session()->flash('message', 'Worker delete!');
        } else {
            session()->flash('message', 'Error!');
        }

        return redirect('/workers');

    }
}
