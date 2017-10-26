<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class Create1494359121TranslationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translation_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value_name');

            $table->timestamps();

        });
        DB::statement('ALTER TABLE translation_items ENGINE = MyISAM');

        Schema::table('translation_items', function (Blueprint $table) {
            foreach (\App\Language::all() as $language) {
                $table->text('value_' . $language->abbreviation)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translation_items');
    }
}
