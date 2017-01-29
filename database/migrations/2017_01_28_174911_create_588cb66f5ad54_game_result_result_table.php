<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create588cb66f5ad54GameResultResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('game_result_result')) {
            Schema::create('game_result_result', function (Blueprint $table) {
                $table->integer('game_result_id')->unsigned()->nullable();
                $table->foreign('game_result_id', 'fk_p_9950_9934_result_gameresult')->references('id')->on('game_results');
                $table->integer('result_id')->unsigned()->nullable();
                $table->foreign('result_id', 'fk_p_9934_9950_gameresult_result')->references('id')->on('results');
                
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
        Schema::dropIfExists('game_result_result');
    }
}
