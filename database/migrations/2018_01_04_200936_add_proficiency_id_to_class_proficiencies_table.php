<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProficiencyIdToClassProficienciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_proficiencies', function (Blueprint $table) {           
			$table->integer("proficiency_id")->nullable();			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_proficiencies', function (Blueprint $table) {           
			$table->dropColumn("proficiency_id");			
        });
    }
}
