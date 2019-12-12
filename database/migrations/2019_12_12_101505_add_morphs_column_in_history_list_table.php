<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMorphsColumnInHistoryListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_lists', function (Blueprint $table) {
            $table->dropColumn('history_data_id');
            $table->dropColumn('for');
            $table->morphs('history_list');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_lists', function (Blueprint $table) {
            //
        });
    }
}
