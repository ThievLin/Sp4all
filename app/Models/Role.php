<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = ['name','display_name','description'];

    public function users(){
    	return $this->BelongToMany(User::class,'user_id','role_id','user_roles');
    }
}
