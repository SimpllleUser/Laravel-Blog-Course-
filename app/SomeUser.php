<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class SomeUser extends Model
{
    use Sluggable;

    protected $fillable = ['user_name'];

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
