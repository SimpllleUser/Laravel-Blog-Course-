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
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
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
         $post->fill ($fields);
         $post->user_id = 1;
         $post->save();

         return $post;
     }

     public function edit($fields){
        $this->fill($fields);
        $this->save();
     }
     public function remove(){
        $this->removeImage();
         $this->delete();
     }
     public  function removeImage(){
        if($this->image != null){
            Storage::delete('uploads/' . $this->image);
        }
     }
     public  function uploadImage($image){
        //  str_random(10)
        if($image == null){return;}
        $this->removeImage();
        $filename = Str::random(10) . '.' . $image ->extension();
        $image->storeAs('uploads', $filename);
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

    public function setFeatured(){
        $this->is_featured = 0;
        $this->save();
    }

    public function setStandart(){
        $this->is_featured = 1;
        $this->save();
    }

    public function toggleFeatured($value){
        if($value==null){
            return $this->setStandart();
        }

        return $this->setFeatured ();
    }
    public function getImage(){
        if($this->image == null){
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;
    }
    public function getCategoryTitle(){
        // if($this->category != null){
        //     return $this->category->title;
        // }
        // return 'No category';
        if($this->category != null){
            return $this->category->title;
        }else{
            return 'No category';
        }
    }
    public function getTagsTitle(){
        if($this->tags != null){
            return implode(', ', $this->tags->pluck('title')->all());
        }else{
            return 'No tags';
        }
    }
    // public function setDateAttribute($value){
    //     // $date = Carbon::createFromFormat('d/m/y' , $value)->format('Y-m-d');
    //    dd($value);
    // }
}
