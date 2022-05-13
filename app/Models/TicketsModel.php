<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketsModel extends Model
{
    use HasFactory;
	protected $table = "tickets";
	protected $fillable = ['uid','ticket_subject','assign_staff','client','priority','cc','description','file','status'];
}
