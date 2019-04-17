<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoVadisEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('go_vadis_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->integer('orginazor');
            $table->string('category');
            $table->string('date');
            $table->string('postal_number');
            $table->string('house_number');
            $table->string('street');
            $table->integer('signed_up');
            $table->integer('max_signed_up');
            $table->integer('finished');
            $table->string('place_points');
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
        Schema::dropIfExists('go_vadis_events');
    }
}
