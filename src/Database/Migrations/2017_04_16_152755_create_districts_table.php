<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('turkey-cities.tables.district', 'districts'), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('county_id')->unsigned();
            $table->string('name');

            $table->foreign('county_id')->references('id')->on(config('turkey-cities.tables.county', 'counties'))->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('turkey-cities.tables.district', 'districts'));
    }
}
