<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prof_bonus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proficiency_id')->unsigned();
            $table->integer('bonus_id')->unsigned();
            $table->timestamps();
			
			$table->foreign('proficiency_id')->references('id')->on('proficiencies');
			$table->foreign('bonus_id')->references('id')->on('bonuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prof_bonus');
    }
}
