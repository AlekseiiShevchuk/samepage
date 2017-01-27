<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('scenarios')) {
            Schema::create('scenarios', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('description')->nullable();
                $table->integer('background_id')->unsigned()->nullable();
                $table->foreign('background_id', 'fk_9810_background_background_id_scenario')->references('id')->on('backgrounds');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('scenarios');
    }
}
