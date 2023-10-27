<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;
class Cat_Gallery extends Model
{
    use HasFactory;
    protected $table = 'cat_galleries';
    public function gallery(){
        return $this->hasMany(Gallery::class,'category_galleries_id');
    }   
}
