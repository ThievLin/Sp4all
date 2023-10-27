<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Gallery_Image;
use App\Models\Cat_Gallery;
use App\Models\User;
class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';

    public function posts_gallery(){
        return $this->belongsToMany(Post::class,'post_galleries','gallerie_id','post_id');
    }  
    public function gallerie_image(){
    	return $this->HasMany(Gallery_Image::class,'gallery_id');
    }
    public function cat_gallery(){
    	return $this->belongsTo(Cat_Gallery::class,'category_galleries_id');
    }
    public function user()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
}
