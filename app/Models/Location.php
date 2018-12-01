<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    public function Farmer()
    {
        return $this->hasMany(Farmer::class,'id','farmer_id');
    }
}
