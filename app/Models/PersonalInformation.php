<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;
	protected $table = "personal_information";
	protected $fillable = ["uid","passport_no","passport_expiry_date","phone","nationality","marital_status","spouse","no_children"];
	
}
