<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->belongsToMany(User::Class);
    }
    public function permissions(){
        return $this->belongsToMany(Permission::Class);
    }

    public function givePermissionTo (Permission $permission)
    {
        $this->permissions()->save($permission);
    }


}

