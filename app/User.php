<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed roles
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notes()
    {
        return $this->hasMany(Note::Class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::Class);
    }
    public function banners()
    {
        return $this->hasMany(banner::Class);
    }

    public function publish(Banner $banner)
    {
        return $this->banners()->save($banner);
   }
    public function owns($related)
    {
        return $this->id == $related->user_id;
    }

    public function hasRole($role)
    {


        if (is_string($role)) {
            // auth()->loginUsingId(10);
            // auth()->logout();
            //$role='manager';

            $rname = $this->roles()->pluck('name');
            if ($rname[0] == $role) {
                return true;
            }
            return false;

        }
        foreach ($role as $r) {
            if ($this->hasRole($r->name)) {
                return true;
            }
        }

        return false;
    }

    public function assignRole($role)
    {
        $this->roles()->sync($role);
    }

}

