<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create588b38ffdea97GamePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('game_player')) {
            Schema::create('game_player', function (Blueprint $table) {
                $table->integer('game_id')->unsigned()->nullable();
                $table->foreign('game_id', 'fk_p_9821_9809_player_game')->references('id')->on('games');
                $table->integer('player_id')->unsigned()->nullable();
                $table->foreign('player_id', 'fk_p_9809_9821_game_player')->references('id')->on('players');
                
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
        Schema::dropIfExists('game_player');
    }
}
