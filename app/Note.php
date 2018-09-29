<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //protected $guarded = ['id'];
    protected $fillable = ['body', 'card_id', 'user_id'];
    public function card(){
        return $this->belongsTo(Card::Class);
    }
    public function user(){
        return $this->belongsTo(User::Class);
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
}
