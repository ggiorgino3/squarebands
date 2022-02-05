<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//phpcs:ignore
class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'photos',
            function (Blueprint $table) {
                $table->id();

                $table->string('name', 100);
                $table->text('description');
                $table->string('caption', 100);
                $table->string('uri', 100);

                $table->foreignId('concert_id')->nullable()->constrained();
                $table->foreignId('news_id')->nullable()->constrained('news');

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
        Schema::dropIfExists('photos');
    }
}
