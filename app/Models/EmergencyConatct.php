<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyConatct extends Model
{
    use HasFactory;
	protected $table="emergency_contact";
	protected $fillable=['uid','primary_name','primary_relation','primary_phone','primary_phone2','secondary_name','secondary_relation','secondary_phone','secondary_phone2'];
}
