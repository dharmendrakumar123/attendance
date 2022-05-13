<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assetmodel extends Model
{
    use HasFactory;
	protected $table="addasset";
	protected $fillable = ['asset_name','brand','condition','assign_user','assign_date','handover'];
}
