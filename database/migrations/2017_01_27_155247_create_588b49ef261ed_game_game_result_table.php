<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create588b49ef261edGameGameResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('game_game_result')) {
            Schema::create('game_game_result', function (Blueprint $table) {
                $table->integer('game_id')->unsigned()->nullable();
                $table->foreign('game_id', 'fk_p_9821_9832_gameresult_game')->references('id')->on('games');
                $table->integer('game_result_id')->unsigned()->nullable();
                $table->foreign('game_result_id', 'fk_p_9832_9821_game_gameresult')->references('id')->on('game_results');
                
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
        Schema::dropIfExists('game_game_result');
    }
}
