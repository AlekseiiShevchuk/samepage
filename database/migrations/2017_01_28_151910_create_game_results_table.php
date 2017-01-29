<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('game_results')) {
            Schema::create('game_results', function (Blueprint $table) {
                $table->increments('id');
                $table->tinyInteger('is_owner_etalon')->default(0);
                $table->integer('for_game_id')->unsigned()->nullable();
                $table->foreign('for_game_id', 'fk_9933_game_for_game_id_game_result')->references('id')->on('games');
                $table->integer('by_player_id')->unsigned()->nullable();
                $table->foreign('by_player_id', 'fk_9932_player_by_player_id_game_result')->references('id')->on('players');
                
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
        Schema::dropIfExists('game_results');
    }
}
