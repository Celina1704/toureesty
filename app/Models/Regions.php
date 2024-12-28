<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    public function tours(){
        return $this->hasMany(Tours::class, 'region_id', 'id');
    }
}
