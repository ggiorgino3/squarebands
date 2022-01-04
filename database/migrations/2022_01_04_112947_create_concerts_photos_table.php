<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//phpcs:ignore 
class CreateConcertsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'concerts_photos',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('concert_id');
                $table->foreign('concert_id')->references('id')->on('concerts');
                $table->unsignedBigInteger('photo_id');
                $table->foreign('photo_id')->references('id')->on('photos');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concerts_photos');
    }
}
