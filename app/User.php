<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;
    const IS_ACTIVE = 0;
    const IS_BANNED = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function commnets(){
        return $this->hasMany(Comment::class);
    }

    public static function add ($fields){
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user();
    }

    public function edit($fields){
        $this->fill($fields);
        $this->password = bcrypt($fields['password']);
        $this->save();
    }

    public function remove(){
        $this->delete();
    } 

    public  function uploadAvatar($image){
        //  str_random(10)
        if($image == null){return;}
        Storage::delete('uploads/' . $this->image);
        $filename = Str::random(10) . '.' . $image ->extension();
        $this->image = $filename;
        $this->save();
     }

     public function getImage(){
        if($this->image == null){
            return '/img/no-user-image.png';
        }

        return '/uploads/' . $this->image;
    }

    public function makeAdmin(){
        $this->is_amdin = 1;
        $this->save();
    }

    public function makeNormal(){
        $this->is_admin = 0;
        $this->save();
    }

    public  function toggleAdmin($value){
        if($value == null){
             return $this-> makeNormal();
        }
        return $this-> makeAdmin();
    }

    public function ban(){
        $this->status = User::IS_BANNED;
        $this->save();
    }

    public function unban(){
        $this->status = User::IS_ACTIVE;
        $this->save();
    }
     
    public function toggleBan($value){
        if($value == null){
            return $this->unban();
        }
        return $this->ban();
    }
}
