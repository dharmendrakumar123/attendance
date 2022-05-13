<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projectmodel extends Model
{
    use HasFactory;
	protected $table = "project";
	protected $fillable = ['project_name','deadline','priority','status','description','files'];
	
	public function users()
    {
        return $this->belongsToMany(User::class,'project_user','project_id','user_uid');
    }
}
