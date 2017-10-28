<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_bonus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bonus_id')->unsigned();
            $table->integer('attribute_id')->unsigned();
            $table->timestamps();
			
			$table->foreign('bonus_id')->references('id')->on('bonuses');
			$table->foreign('attribute_id')->references('id')->on('attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_bonus');
    }
}
