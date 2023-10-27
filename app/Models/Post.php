<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Page_cat;
use App\Models\Gallery;
use App\Models\Slide;
use App\Models\Post_image;
use App\Models\Language;
class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    public $directory = "/images";

    public function gePathAttribute($value){
      return $this->directory. $value;
    }
  
    public function menus()
    {
        return $this->belongsToMany(Menu::class,'menu_posts','post_id','menu_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'post_categories','post_id','categorie_id');
    }

        public function cate()
    {
        return $this->belongsToMany(Category::class,'page_categories','page_id','categorie_id');
    }
        public function company()
    {
        return $this->belongsToMany(Category::class,'page_categories','page_id','company_id');
    }
        public function brand()
    {
        return $this->belongsToMany(Category::class,'page_categories','page_id','brand_id');
    }
    public function page_cat_posi(){
        return $this->hasMany(Page_cat::class,'post_id');
    }
    public function galleries()
    {
        return $this->belongsToMany(Gallery::class,'post_galleries','post_id','gallerie_id');
    }
    public function slides(){
        return $this->belongsToMany(Slide::class,'post_slides','slide_id','post_id');
    }
  
    public function image_post(){
        return $this->hasMany(Post_image::class,'post_id');
    }
    public function user(){
        return $this->belongsTo(Post::class,'user_id');
    }
    public function lang(){
        return $this->belongsTo(Language::class,'language');
    }
    public function translation(){
        return $this->belongsTo(static::class, 'translation');
    }
}
