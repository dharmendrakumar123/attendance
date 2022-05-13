<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
	protected $fillable = ['namne','slug'];
	
	public function roles(){
		return $this->belongsToMany(Role::class,'roles_permission','role_id','permission_id');
	}
	
	public function users(){
		return $this->belongsToMany(User::class,'users_permission','user_id','permission_id');
	}
}
