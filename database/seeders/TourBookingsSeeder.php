<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TourBookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tour_bookings')->insert([
            'tour_id' => 3,
            'customer_id' => 1,
            'total_price' => 1888000,
            'quantity' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('tour_bookings')->insert([
            'tour_id' => 2,
            'customer_id' => 1,
            'total_price' => 5000000,
            'quantity' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('tour_bookings')->insert([
            'tour_id' => 1,
            'customer_id' => 2,
            'total_price' => 6000000,
            'quantity' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('tour_bookings')->insert([
            'tour_id' => 5,
            'customer_id' => 3,
            'total_price' => 6000000,
            'quantity' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
