<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
//use Spatie\Permission\Traits\HasRoles;
use App\Traits\HasPermissionsTrait;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
		'phone',
		'uid',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	
	public function isAdmin() {
        $admin_id = Auth::user()->id;
        $admin = $this->roles()->where('user_id',$admin_id)->first();
        //$admin = $this->roles()->where('name','Superadmin')->first();
	   if($admin->slug =="superadmin"){
		  $roles =  $admin; 
	   }else{
		  //$roles = $this->roles()->where('name','Employee')->orwhere('name','HR')->first();
          $roles = $this->roles()->where('user_id',$admin_id)->first();
	   }
	   return $roles->slug === 'superadmin';
    }
	
	public function isUser() {
        $empl_id = Auth::user()->id;
        $employee = $this->roles()->where('user_id',$empl_id)->first();
		//$employee = $this->roles()->where('name','Employee')->orwhere('name','HR')->first();
        if($employee->slug == "employee" || $employee->slug =="hr" || $employee->slug =="manager"){
			$roles = $employee;
		}else{
			$roles = $this->roles()->where('user_id',$empl_id)->first();
		}
		//dd($roles->slug);
        return ($roles->slug === 'employee' || $roles->slug === 'hr' || $roles->slug === 'manager');
    }

	public function project()
    {
        return $this->belongsToMany(projectmodel::class,'project_user','project_id','user_uid')->with('users');
    }

	public function roles(){
		return $this->belongsToMany(Role::class,'users_roles','user_id','role_id');
	}
	
	public function permissions(){
		return $this->belongsToMany(Permission::class,'users_permission','user_id','permission_id');
	}
	
}
