<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('results')) {
            Schema::create('results', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('x_coordinate')->nullable();
                $table->integer('y_coordinate')->nullable();
                $table->integer('rotary_angle')->nullable();
                $table->integer('for_image_id')->unsigned()->nullable();
                $table->foreign('for_image_id', 'fk_9930_image_for_image_id_result')->references('id')->on('images');
                $table->integer('by_player_id')->unsigned()->nullable();
                $table->foreign('by_player_id', 'fk_9932_player_by_player_id_result')->references('id')->on('players');
                $table->integer('for_game_id')->unsigned()->nullable();
                $table->foreign('for_game_id', 'fk_9933_game_for_game_id_result')->references('id')->on('games');
                $table->tinyInteger('owner_base_result')->default(0);
                
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
        Schema::dropIfExists('results');
    }
}
