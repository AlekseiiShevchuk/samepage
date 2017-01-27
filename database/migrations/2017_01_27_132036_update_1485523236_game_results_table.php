<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1485523236GameResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_results', function (Blueprint $table) {
            $table->tinyInteger('owner_base_result')->default(0);
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_results', function (Blueprint $table) {
            $table->dropColumn('owner_base_result');
            
        });

    }
}
