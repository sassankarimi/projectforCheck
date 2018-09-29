<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = ['id'];
    //
    public function notes() {
        return $this->hasMany(Note::Class);
    }
    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }
}
