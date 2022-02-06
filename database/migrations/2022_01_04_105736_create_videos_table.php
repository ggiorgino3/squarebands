<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//phpcs:ignore 
class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'videos',
            function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);

                $table->string('uri', 300);
                $table->text('description');
                $table->string('type', 50)->default('local');
                $table->string('tags', 100)->nullable();

                $table->foreignId('concert_id')->nullable()->constrained();

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
        Schema::dropIfExists('videos');
    }
}
