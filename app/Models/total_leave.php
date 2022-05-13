<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class total_leave extends Model
{
    use HasFactory;
	protected $table = "user_total_leave";
	protected $fillable = ['uid','total_leave'];
}
