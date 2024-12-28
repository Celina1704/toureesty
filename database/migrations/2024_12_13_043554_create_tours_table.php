<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string("tour_name");
            $table->unsignedBigInteger('tourGuide_id');
            $table->foreign('tourGuide_id')->references('id')->on('tour_guides');
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->float('rating');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('language');
            $table->bigInteger('price');
            $table->integer('num_people_booked');
            $table->longText('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours_tables');
    }
};
