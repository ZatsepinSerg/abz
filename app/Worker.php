<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = [];

    public function allWorkers()
    {
        $res = Worker::select('id', 'parent_id', 'surname', 'name', 'patronymic', 'position', 'date_receipt', 'salary')
            ->orderBy('parent_id', 'ASC')->get();

        return $res;
    }

    public function allInfoWorkers()
    {
        $res = Worker::select('id', 'photo', 'surname', 'name', 'patronymic', 'position', 'date_receipt', 'salary')
            ->orderBy('salary', 'DESC')->paginate(10);

        return $res;
    }

     public function searchInfoWorkers($string = '',$select_column)
    {
        $res = Worker::select('id', 'photo', 'surname', 'name', 'patronymic', 'position', 'date_receipt', 'salary')
            ->where($select_column, 'like', '%'.$string.'%')->get();

        return $res;
    }

      public function sortInfoWorkers($select_column,$string = 'DESC')
    {
        $res = Worker::select('id', 'photo', 'surname', 'name', 'patronymic', 'position', 'date_receipt', 'salary')
            ->orderBy($select_column, $string)->get();

        return $res;
    }

    public function InfoWorker($id)
    {
        $res = Worker::select('id', 'photo','parent_id', 'surname', 'name', 'patronymic', 'position', 'date_receipt', 'salary')
            ->find($id);

        return $res;
    }

    public function bossInfo($id)
    {
        $res = Worker::select('id', 'surname', 'patronymic')
            ->find($id);

        return $res;
    }
      public function oldPhotoWay($id)
    {
        $res = Worker::select('photo')
            ->find($id);

        return $res;
    }

    public function updateWorker($id,$request,$photoWay)
    {

        if (!empty($photoWay)) {
            $result = Worker::where('id', '=', $id)->update([
                'name' => $request->name,
                'patronymic'=> $request->patronymic,
                'surname' => $request->surname,
                'parent_id' => $request->boss,
                'position' => $request->position,
                'date_receipt' => $request->date_receipt,
                'salary' => $request->salary,
                'photo' => $photoWay,
            ]);
        }else{
            $result = Worker::where('id', '=', $id)->update([
                'name' => $request->name,
                'patronymic'=> $request->patronymic,
                'surname' => $request->surname,
                'parent_id' => $request->boss,
                'position' => $request->position,
                'date_receipt' => $request->date_receipt,
                'salary' => $request->salary
            ]);
        }

        return  $result;
    }

    public function subordinate($id){

        $res = Worker::select('id')->where('parent_id', '=', $id)->get();

        return  $res;
    }

     public function newBoss($id)
     {

        $res = Worker::select('parent_id')->find($id);

        return  $res;
    }

    public function updateBossInfo($worker,$newBoss)
    {

        $result = Worker::where('id', '=', $worker)->update([
            'parent_id' => $newBoss
        ]);

        return  $result;
    }

    public function deleteWorker($id){

        $answer = Worker::where('id', '=', $id)->delete();

        return  $answer;
    }

}
