<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class TypeTask extends Model
{
    use Sluggable;

    protected $fillable = ['title'];

    public function tasks(){
        return $this->hasMany(Task::class,'task_id');
    }


    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
