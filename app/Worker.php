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
            ->orderBy('salary', 'DESC')->get();

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


}
