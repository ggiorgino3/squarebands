<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//phpcs:ignore 
class CreateOptionsTable extends Migration
{
    //phpcs:ignore
    public function up()
    {
        Schema::create(
            'options',
            function (Blueprint $table) {
                $table->id();
                $table->string('title', 50)->nullable();
                $table->string('meta_key', 50);
                $table->text('meta_value');
                $table->boolean('visible_on_frontend');
                $table->timestamps();
            }
        );
    }

    //phpcs:ignore
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
