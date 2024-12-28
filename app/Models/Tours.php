<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tours extends Model
{
    public function tour_guides(){
        return $this->belongsTo(tour_guides::class, 'tourGuide_id', 'id');
    }

    public function region(){
        return $this->belongsTo(Regions::class, 'region_id', 'id');
    }

    public function tour_bookings(){
        return $this->hasMany(Tour_Bookings::class, 'tour_id', 'id');
    }
}
