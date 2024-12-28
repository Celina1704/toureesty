<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tour_guides extends Model
{
    public function tours(){
        return $this->hasMany(Tours::class, 'tourGuide_id', 'id');
    }
}
