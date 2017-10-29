<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeaponPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapon_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weapon_id')->unsigned();
            $table->integer('property_id')->unsigned();
            $table->timestamps();
			
			$table->foreign('weapon_id')->references('id')->on('weapons');
			$table->foreign('property_id')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weapon_properties');
    }
}
