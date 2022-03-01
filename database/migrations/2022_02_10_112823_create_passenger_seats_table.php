<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger_seats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('passenger_id')->constrained();
            $table->foreignId('seat_id')->constrained();
            $table->integer('bus_id');
            $table->integer('trip_id');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passenger_seats');
    }
}
