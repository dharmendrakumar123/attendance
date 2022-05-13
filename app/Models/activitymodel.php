<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activitymodel extends Model
{
    use HasFactory;
	protected $table="activity";
	protected $fillable=['uid','day','time_in','time_out'];
}
