<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PunchOut extends Model
{
    use HasFactory;
	protected $table='punch_out';  
	protected $fillable=['uid','day','time_out']; 
}
