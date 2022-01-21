<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//phpcs:ignore 
class CreateNewsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Schema::create(
            'news_photos',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('news_id');
                $table->foreign('news_id')->references('id')->on('news');
                $table->unsignedBigInteger('photo_id');
                $table->foreign('photo_id')->references('id')->on('photos');
                $table->timestamps();
            }
        ); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_photos');
    }
}
