<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour_Bookings extends Model
{
    protected $table = 'tour_bookings';
    protected $fillable = [
        'customer_id',
        'tour_id',
        'total_price',
        'quantity',
    ];

    public function tours(){
        return $this->belongsTo(Tours::class, 'tour_id', 'id');
    }

    public function customers(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
