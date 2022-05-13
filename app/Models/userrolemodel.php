<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userrolemodel extends Model
{
    use HasFactory;
	protected $table = "user_roles";
	protected $fillable = ['role_name'];
}
