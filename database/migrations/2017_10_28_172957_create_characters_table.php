<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('AC');
            $table->integer('HP_max');
            $table->integer('HP_current');
            $table->integer('Initiative');
            $table->string('Name');
            $table->string('Player Name');
            $table->integer('background_id')->unsigned();
            $table->integer('race_id')->unsigned();
            $table->integer('subrace_id')->unsigned();
            $table->integer('attribute1_id')->unsigned();
            $table->integer('attribute2_id')->unsigned();
            $table->integer('attribute3_id')->unsigned();
            $table->integer('attribute4_id')->unsigned();
            $table->integer('attribute5_id')->unsigned();
            $table->integer('attribute6_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->timestamps();
			
			$table->foreign('background_id')->references('id')->on('backgrounds');
			$table->foreign('race_id')->references('id')->on('races');
			$table->foreign('class_id')->references('id')->on('classes');
			$table->foreign('attribute1_id')->references('id')->on('attributes');
			$table->foreign('attribute2_id')->references('id')->on('attributes');
			$table->foreign('attribute3_id')->references('id')->on('attributes');
			$table->foreign('attribute4_id')->references('id')->on('attributes');
			$table->foreign('attribute5_id')->references('id')->on('attributes');
			$table->foreign('attribute6_id')->references('id')->on('attributes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
