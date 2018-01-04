<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassProficienciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_proficiencies', function (Blueprint $table) {
            $table->increments('id');
			$table->string("type");
			$table->integer("class_id")->nullable();
			$table->integer("attribute_id")->nullable();
			$table->integer("skill_id")->nullable();
			$table->integer("num_skills_granted")->nullable();
			$table->integer("weapon_id")->nullable();
			$table->integer("armor_id")->nullable();
			$table->integer("tool_id")->nullable();
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
        Schema::dropIfExists('class_proficiencies');
    }
}
