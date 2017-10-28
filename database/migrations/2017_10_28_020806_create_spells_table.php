<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spells', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('school');
            $table->integer('level');
            $table->string('range');
            $table->string('concentration');
            $table->string('cast_time');
            $table->string('duration');
            $table->string('components');
            $table->string('at_higher_levels');
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
        Schema::dropIfExists('spells');
    }
}
