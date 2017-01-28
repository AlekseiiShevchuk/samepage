<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create588c78f3ce8c8GameResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('game_result')) {
            Schema::create('game_result', function (Blueprint $table) {
                $table->integer('game_id')->unsigned()->nullable();
                $table->foreign('game_id', 'fk_p_9933_9934_result_game')->references('id')->on('games');
                $table->integer('result_id')->unsigned()->nullable();
                $table->foreign('result_id', 'fk_p_9934_9933_game_result')->references('id')->on('results');
                
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
        Schema::dropIfExists('game_result');
    }
}
