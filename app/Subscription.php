<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscription extends Model
{
    public static function add($email){
        $sub = new static;
        $sub->email = $email;
//        $sub->token = Str::random(100);
        $sub->save();

        return $sub;
    }

    public function generateToken()
    {
        $this->token = Str::random(100);
        $this->save();
    }

    public  function remove(){
        $this->delete();
    }
}
