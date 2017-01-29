<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1485617371GamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->integer('owner_etalon_result_id')->unsigned()->nullable();
                $table->foreign('owner_etalon_result_id', 'fk_9950_gameresult_owner_etalon_result_id_game')->references('id')->on('game_results');
                $table->integer('scenario_id')->unsigned()->nullable();
                $table->foreign('scenario_id', 'fk_9931_scenario_scenario_id_game')->references('id')->on('scenarios');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign('fk_9950_gameresult_owner_etalon_result_id_game');
            $table->dropIndex('fk_9950_gameresult_owner_etalon_result_id_game');
            $table->dropColumn('owner_etalon_result_id');
            $table->dropForeign('fk_9931_scenario_scenario_id_game');
            $table->dropIndex('fk_9931_scenario_scenario_id_game');
            $table->dropColumn('scenario_id');
            
        });

    }
}
