<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Slide;
class Slide_Type extends Model
{
    use HasFactory;
    protected $table = 'slide_type';
    public function slides(){
        return $this->hasMany(Slide::class,'slide_type_id');
    }   
}
