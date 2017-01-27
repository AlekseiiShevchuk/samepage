<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1485520648BackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backgrounds', function (Blueprint $table) {
            $table->string('name')->nullable();
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('backgrounds', function (Blueprint $table) {
            $table->dropColumn('name');
            
        });

    }
}
