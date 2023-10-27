<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Page_cat;
use App\Models\User;
class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    public function post()
    {
    	return $this->belongsToMany(Post::class,'page_categories','categorie_id','page_id');
    }
    public function products()
    {
    	return $this->belongsToMany(Post::class,'page_categories','brand_id','page_id');
    }

    public function cat_position(){
			return $this->hasOne(Page_cat::class,'categorie_id');
	}
	
	public function user(){
	    return $this->belongsTo(User::class,'user_id');
	}
}
