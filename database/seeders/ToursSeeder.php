<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ToursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tours')->insert([
            'tour_name' => 'Celebrate New Years With Us',
            'tourGuide_id' => 1,
            'region_id' => 1,
            'rating' => 4.3,
            'start_date' => '2024-12-25',
            'end_date' => '2024-12-30',
            'language' => 'English',
            'price' => 3000000,
            'num_people_booked' => 15,
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Jakarta_Skyline_Part_2.jpg/640px-Jakarta_Skyline_Part_2.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('tours')->insert([
            'tour_name' => 'The Best Bali Couple Tours',
            'tourGuide_id' => 2,
            'region_id' => 2,
            'rating' => 4.5,
            'start_date' => '2025-01-13',
            'end_date' => '2024-01-15',
            'language' => 'English',
            'price' => 2500000,
            'num_people_booked' => 38,
            'image' => 'https://international.unud.ac.id/protected/storage/file_summernote/4a0885ebc3c02b217cbf6c079eca6b37.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('tours')->insert([
            'tour_name' => 'Explore Yogyakarta Secrets',
            'tourGuide_id' => 3,
            'region_id' => 3,
            'rating' => 3.8,
            'start_date' => '2025-03-01',
            'end_date' => '2024-03-08',
            'language' => 'Bahasa Indonesia',
            'price' => 1888000,
            'num_people_booked' => 20,
            'image' => 'https://ik.imagekit.io/tvlk/xpe-asset/AyJ40ZAo1DOyPyKLZ9c3RGQHTP2oT4ZXW+QmPVVkFQiXFSv42UaHGzSmaSzQ8DO5QIbWPZuF+VkYVRk6gh-Vg4ECbfuQRQ4pHjWJ5Rmbtkk=/2001162996890/Candi-Borobudur-Tickets-0139bc36-8027-409a-a514-0067bdb6c8d7.jpeg?tr=q-60,c-at_max,w-540,h-960&_src=imagekit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('tours')->insert([
            'tour_name' => 'Jakarta: The Heart of Indonesia',
            'tourGuide_id' => 1,
            'region_id' => 2,
            'rating' => 5.0,
            'start_date' => '2024-12-27',
            'end_date' => '2025-01-02',
            'language' => 'English',
            'price' => 4500000,
            'num_people_booked' => 32,
            'image' => 'https://assets-a1.kompasiana.com/items/album/2023/09/13/2633584284-65013bd217698364cc319282.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('tours')->insert([
            'tour_name' => "Culinary Adventures in Jogja",
            'tourGuide_id' => 3,
            'region_id' => 3,
            'rating' => 4.8,
            'start_date' => '2025-03-17',
            'end_date' => '2025-03-20',
            'language' => 'English',
            'price' => 2000000,
            'num_people_booked' => 10,
            'image' => 'https://jogjakita.co.id/wp-content/uploads/2021/03/kuliner-jogja.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('tours')->insert([
            'tour_name' => 'Nusa Penida Tours',
            'tourGuide_id' => 2,
            'region_id' => 2,
            'rating' => 3.1,
            'start_date' => '2025-04-2',
            'end_date' => '2024-04-9',
            'language' => 'English',
            'price' => 3600000,
            'num_people_booked' => 27,
            'image' => 'https://www.goatsontheroad.com/wp-content/uploads/2019/08/best-beaches-in-bali.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
