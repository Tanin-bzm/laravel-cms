<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Post extends Model
{ 
     use SoftDeletes;
     protected $date=['deleted_at'];
    protected $fillable=['title','content'];


   public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function photos()
        {
            return $this->morphMany(Photo::class,'imageable' );
        }

        public function tags(){
            return $this->morphToMany(Tag::class, 'taggable');
        }
        // Accessors
        public function getTitleAttribute($value){
            // return strtoupper($value);
            return ucfirst($value);
        }
        // Mutators
        public function setTitleattribute($value){
            $this->attributes['title']=ucfirst($value);
        }
        
}  
