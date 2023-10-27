<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ads_image;
class Ads extends Model
{
    use HasFactory;
    protected $table = 'ads';
    public function ads_image(){
    	return $this->HasMany(Ads_image::class,'ads_id');
    }
}
