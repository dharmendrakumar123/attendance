<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PunchModel extends Model
{
    use HasFactory;
	
	protected $table='punch';  
	protected $fillable=['uid','day','time_in','time_out','break','hours']; 
	
	
	
}
