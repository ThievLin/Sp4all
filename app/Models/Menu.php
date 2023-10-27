<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu_type;
use App\Models\Language;
use App\Models\Post;
class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';
    public function pages()
    {
        return $this->belongsToMany(Post::class,'menu_posts','menu_id','post_id');
    }

    public function menu_type(){
    	return $this->belongsTo(Menu_type::class,'menu_type_id');
    }
    public function parents()
    {
        return $this->belongsTo(static::class, 'parent_id');
    }
    public function languages()
    {
        return $this->belongsTo(language::class, 'language');
    }
}
