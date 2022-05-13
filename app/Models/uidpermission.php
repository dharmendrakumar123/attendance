<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uidpermission extends Model
{
    use HasFactory;
	protected $table="uid_has_permission";
	protected $fillable = ['permission_id','uid'];
}
