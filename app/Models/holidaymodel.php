<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class holidaymodel extends Model
{
    use HasFactory;
	protected $table = "holiday";
	protected $fillable = ['name','day','date'];
}
