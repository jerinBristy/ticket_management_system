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
            $table->foreignId('passenger_id')->constrained('passengers');
            $table->foreignId('bus_id')->constrained('buses');
            $table->foreignId('seat_id')->constrained('seats');
            $table->foreignId('trip_id')->constrained('trips');
            $table->integer('price')->nullable();
            $table->timestamps();
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
