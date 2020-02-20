<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Task extends Model
{
    use Sluggable;

    protected $fillable = ['title'];

    public function status_tasks(){
        return $this->belongsTo(StatusTask::class,'status_id');
    }

    public function type_tasks(){
        return $this->belongsTo(TypeTask::class,'type_id');
    }


    public function some_users(){
        return $this->belongsTo(SomeUser::class,'user_id');
        // Возможно надо будет корректировать отшонений полей таблицы

    }

    public static function add($fields){
        $task = new static;
        $task->fill($fields);
        $task->user_id = 1;
        $task->save();

        return $task;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }

    public function setTypeTask($id){
        if($id == null){return;}
        $this->type_id = $id;
    }


    public function setStatusTask($id){
        if($id == null){return;}
        $this->status_id = $id;
    }

    public function getDate(){
        return $this->date;
    }

    // public function text()
    // {
    //     return 'Some text'
    // }

    public function getType()
    {
        return $this->type_tasks->title;
    }

    public function getStatus()
    {
        return $this->status_tasks->title;
    }

    public function getSomeUser()
    {
        return $this->some_users->user_name;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
