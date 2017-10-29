<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weapon_id')->unsigned();
            $table->integer('armor_id')->unsigned();
            $table->integer('tool_id')->unsigned();
            $table->integer('item_id')->unsigned();
            $table->integer('money_id')->unsigned();
            $table->integer('pack_id')->unsigned();
            $table->integer('character_id')->unsigned();
            $table->integer('container_id')->unsigned();
            $table->timestamps();
			
			$table->foreign('weapon_id')->references('id')->on('weapons');
			$table->foreign('armor_id')->references('id')->on('armors');
			$table->foreign('tool_id')->references('id')->on('tools');
			$table->foreign('item_id')->references('id')->on('items');
			$table->foreign('money_id')->references('id')->on('monies');
			$table->foreign('pack_id')->references('id')->on('packs');
			$table->foreign('character_id')->references('id')->on('characters');
			$table->foreign('container_id')->references('id')->on('containers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
}
