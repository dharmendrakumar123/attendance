<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class livechat extends Model
{
    use HasFactory;
	protected $table    = "live_chat";
	protected $fillable = ['uid','message'];
}
