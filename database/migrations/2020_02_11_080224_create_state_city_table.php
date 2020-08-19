<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state_name', 80);
            $table->integer('country_id');
            $table->timestamps();
        });


        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city_name', 80);
            $table->integer('state_id');
            $table->integer('country_id');
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
        Schema::dropIfExists('states');

        Schema::dropIfExists('cities');
    }
}
