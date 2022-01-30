<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//phpcs:ignore 
class CreateConcertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'concerts',
            function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->text('description')->nullable();
                $table->string('place_name', 100); // Stadium name, theater...
                $table->string('place_address', 100);
                $table->string('country_name', 100);
                $table->string('city_name', 100);
                $table->datetime('datetime'); // YYYY-MM-DD hh:mm:ss
                $table->time('gate_opening')->nullable();
                $table->integer('maximum_seating_no')->nullable();
                $table->text('ticket_link')->nullable();
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
        Schema::dropIfExists('concerts');
    }
}
