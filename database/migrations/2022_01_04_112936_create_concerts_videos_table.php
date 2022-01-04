<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//phpcs:ignore 
class CreateConcertsVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'concerts_videos',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('concert_id');
                $table->foreign('concert_id')->references('id')->on('concerts');
                $table->unsignedBigInteger('video_id');
                $table->foreign('video_id')->references('id')->on('videos');
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
        Schema::dropIfExists('concerts_videos');
    }
}
