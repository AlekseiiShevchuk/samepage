<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create588c792bcfacaPlayerResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('player_result')) {
            Schema::create('player_result', function (Blueprint $table) {
                $table->integer('player_id')->unsigned()->nullable();
                $table->foreign('player_id', 'fk_p_9932_9934_result_player')->references('id')->on('players');
                $table->integer('result_id')->unsigned()->nullable();
                $table->foreign('result_id', 'fk_p_9934_9932_player_result')->references('id')->on('results');
                
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
        Schema::dropIfExists('player_result');
    }
}
