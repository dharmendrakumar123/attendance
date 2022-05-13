<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PunchIn extends Model
{
    use HasFactory;
	protected $table = 'punch_in';  
	protected $fillable = ['uid','day','time_in']; 
}
