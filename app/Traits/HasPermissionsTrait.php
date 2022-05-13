<?php 
namespace App\Traits;
use App\Models\Permission;
use App\Models\Role;

trait HasPermissionsTrait{
   // get permission
    public function getAllPermissions($permission){
        return Permission::whereIn('slug',$permissions)->get();
    }

    //Check has permission
    public function hasPermission($permission) {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
      }

    // Check has roles
    public function hasRole( ... $roles ) {
        foreach ($roles as $role) {
          if ($this->roles->contains('slug', $role)) {
            return true;
          }
        }
        return false;
    }
    

    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }


    public function hasPermissionThroughRole($permission) {
        foreach ($permission->roles as $role){
          if($this->roles->contains($role)) {
            return true;
          }
        }
        return false;
    }

    //Give permission
    public function givePermissionsTo(... $permissions) {
        $permissions = $this->getAllPermissions($permissions);
        
        if($permissions === null) {
         return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }


    public function permissions(){
		return $this->belongsToMany(Permission::class,'users_permission','user_id','permission_id');
	}   

    public function roles(){
		return $this->belongsToMany(Role::class,'users_roles','user_id','role_id');
	}
	

}

?>