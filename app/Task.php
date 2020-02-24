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
        $this->type_id = $id;
        $this->save();
    }


    public function setStatusTask($id){
        $this->status_id = $id;
        $this->save();
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
        // Получить установаленный тип task
    }

    public function getStatus()
    {
        return $this->status_tasks->title;
        // Получить установаленный статус task
    }

    public function getSomeUser()
    {
        return $this->some_users->user_name;
        // Получить данные пользователя , который выполнил задание
        // В данном примере имя , можно менять на другие имена полей из таблицы some_user
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
