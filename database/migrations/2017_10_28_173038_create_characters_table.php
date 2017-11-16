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
            $table->integer('background_id');
            $table->integer('race_id');
            $table->integer('subrace_id');
            $table->integer('strength');
            $table->integer('dexterity');
            $table->integer('constitution');
            $table->integer('wisdom');
            $table->integer('intelligence');
            $table->integer('charisma');
            $table->integer('class_id')->unsigned();
            $table->timestamps();
			
			$table->foreign('background_id')->references('id')->on('backgrounds');
			$table->foreign('race_id')->references('id')->on('races');
			$table->foreign('class_id')->references('id')->on('classes');
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
