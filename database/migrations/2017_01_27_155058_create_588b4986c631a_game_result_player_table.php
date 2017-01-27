<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create588b4986c631aGameResultPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('game_result_player')) {
            Schema::create('game_result_player', function (Blueprint $table) {
                $table->integer('game_result_id')->unsigned()->nullable();
                $table->foreign('game_result_id', 'fk_p_9832_9809_player_gameresult')->references('id')->on('game_results');
                $table->integer('player_id')->unsigned()->nullable();
                $table->foreign('player_id', 'fk_p_9809_9832_gameresult_player')->references('id')->on('players');
                
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
        Schema::dropIfExists('game_result_player');
    }
}
