<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RouteSeatType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_seat_type', function (Blueprint $table) {
            $table->foreignId('route_id')->constrained();
            $table->foreignId('seat_type_id')->constrained();
            $table->integer('price');
            $table->string('bus_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
