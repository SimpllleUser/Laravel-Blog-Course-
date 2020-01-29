<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class Post extends Model
{
    use Sluggable;
    protected $fillable = ['title','content','date'];

    public function category(){
        return $this->hasOne(Category::class);
    }

    public function author(){
        return $this->hasOne(User::class);
    }

    public function tags(){
        return $this->belongsToMany(
        Tag::class,
        'post_tags',
        'post_id',
        'tag_id'
        );
    }
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
     public static function add($fields){
         $post = new static;
         $post->fillable($fields);
         $post->user_id = 1;
         $post->save();

         return $post;
     }

     public function edit($fields){
        $this->fill($fields);
        $this->save();
     }
     public function remove(){
         Storage::delete('uploads/' . $this->image);
         $this->delete();
     }

     public  function uploadImage($image){
        //  str_random(10)
        if($image == null){return;}
        Storage::delete('uploads/' . $this->image);
        $filename = Str::random(10) . '.' . $image ->extension();
        $this->image = $filename;
        $this->save();
     }
     public function setCategory($id){
         if($id == null){return;}
         $this->category_id = $id;
         $this->save();
     }

     public function setTags($ids){
        if($ids == null){return;}
        $this->tags()->sync($ids);
    }

    public function setDraft(){
        $this->status = 0;
        $this->save();
    }

    public function setPublic(){
        $this->status = 1;
        $this->save();
    }
    public function toggleStatus($value){
        if($value==null){
            return $this->setDraft();
        }

        return $this->setPublic();
    }

    public function setFeature(){
        $this->is_feature = 0;
        $this->save();
    }

    public function setStandart(){
        $this->is_feature = 1;
        $this->save();
    }

    public function toggleFeature($value){
        if($value==null){
            return $this->setStandart();
        }

        return $this->setFeature ();
    }
    public function getImage(){
        if($this->image == null){
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;
    }
    public function setDateAttribute($value){
       $date = Carbon::createFromFormat('d/m/y' , $value)->format('Y-m-d');
       dd($date);
    }
}
