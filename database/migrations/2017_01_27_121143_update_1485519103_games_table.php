<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1485519103GamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->integer('owner_id')->unsigned()->nullable();
                $table->foreign('owner_id', 'fk_9809_player_owner_id_game')->references('id')->on('players');
                
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
            $table->dropForeign('fk_9809_player_owner_id_game');
            $table->dropIndex('fk_9809_player_owner_id_game');
            $table->dropColumn('owner_id');
            
        });

    }
}
