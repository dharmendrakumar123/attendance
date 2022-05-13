<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskBoardModel extends Model
{
    use HasFactory;
	protected $table="task_board";
	protected $fillable = ['uid','task_name','task_priority','due_date','task_board_name','status'];
}
