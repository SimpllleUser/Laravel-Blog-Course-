<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class StatusTask extends Model
{
    // use Sluggable;

    protected $fillable = ['title'];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
