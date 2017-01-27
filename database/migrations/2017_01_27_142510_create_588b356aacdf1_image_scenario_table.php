<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create588b356aacdf1ImageScenarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('image_scenario')) {
            Schema::create('image_scenario', function (Blueprint $table) {
                $table->integer('image_id')->unsigned()->nullable();
                $table->foreign('image_id', 'fk_p_9815_9811_scenario_image')->references('id')->on('images');
                $table->integer('scenario_id')->unsigned()->nullable();
                $table->foreign('scenario_id', 'fk_p_9811_9815_image_scenario')->references('id')->on('scenarios');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_scenario');
    }
}
