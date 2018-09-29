<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = ['id'];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public  function scopeLocatedAt($query,$zip,$street)
    {
        $street=str_replace('-',' ',$street);
        return $query->where(compact('zip','street'))->first();
    }

    public function addPhoto(Photo $photo)
    {
        $this->photos()->save($photo);

    }
}
