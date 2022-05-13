<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceModel extends Model
{
    use HasFactory;
	protected $table = "experience";
	protected $fillable = ["uid","company_name","position","add_experience","location"];
}
