<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
class Menu_type extends Model
{
    use HasFactory;
    protected $table = 'menu_types';
    protected $fillable = ['name'];
	
	public function menus(){
        return $this->belongsToMany(Menu::class,'menu_type_id');
    }
}
