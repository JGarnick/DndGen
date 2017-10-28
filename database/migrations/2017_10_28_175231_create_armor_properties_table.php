<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmorPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armor_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('armor_id')->unsigned();
            $table->integer('property_id')->unsigned();
            $table->timestamps();
			
			$table->foreign('armor_id')->references('id')->on('armors');
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
        Schema::dropIfExists('armor_properties');
    }
}
