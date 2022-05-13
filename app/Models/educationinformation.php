<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class educationinformation extends Model
{
    use HasFactory;
	protected $table="education_information";
	protected $fillable = ["uid","institue","education","passing_year","marks_obtained","stream","grade"];
}
