<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
	protected $table = 'employee_leave';  
	protected $fillable = ['leave_type','time','from','to','number_days','leave_remaining','leave_reason']; 
}
