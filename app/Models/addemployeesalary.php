<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addemployeesalary extends Model
{
    use HasFactory;
	
	protected $table = "addemployeesalary";
	protected $fillable = ['staff_name','salary'];
	
}
