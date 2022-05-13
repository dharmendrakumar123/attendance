<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bankinformation extends Model
{
    use HasFactory;
	protected $table="bank_information";
	protected $fillable = ['uid','name','account_number','ifsc_code','branch_name','bank_address'];
}
