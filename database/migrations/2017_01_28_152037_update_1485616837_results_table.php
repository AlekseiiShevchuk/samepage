<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1485616837ResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('results', function (Blueprint $table) {
            $table->dropForeign('fk_9932_player_by_player_id_result');
            $table->dropIndex('fk_9932_player_by_player_id_result');
            $table->dropColumn('by_player_id');
            $table->dropForeign('fk_9933_game_for_game_id_result');
            $table->dropIndex('fk_9933_game_for_game_id_result');
            $table->dropColumn('for_game_id');
            $table->dropColumn('owner_base_result');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
                        $table->integer('by_player_id')->unsigned()->nullable();
                $table->foreign('by_player_id', 'fk_9932_player_by_player_id_result')->references('id')->on('players');
                $table->integer('for_game_id')->unsigned()->nullable();
                $table->foreign('for_game_id', 'fk_9933_game_for_game_id_result')->references('id')->on('games');
                $table->tinyInteger('owner_base_result')->default(0);
                
        });

    }
}
