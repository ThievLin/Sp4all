<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slide_Type;
use App\Models\User;
use App\Models\Slide_image;
use App\Models\Post;
class Slide extends Model
{
    use HasFactory;
    protected $table = 'slides';

    public function slide_type(){
        return $this->belongsTo(Slide_Type::class,'slide_type_id');
      }
      public function user()
      {
        return $this->belongsTo(User::class,'user_id');
      }
         public function posts_slide(){
          return $this->belongsToMany(Post::class,'post_slides','post_id','slide_id');
      }
      public function slide_image(){
          return $this->HasMany(Slide_image::class,'slide_id');
      }
}
