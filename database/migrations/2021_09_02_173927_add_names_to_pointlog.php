<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNamesToPointlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pointlog', function (Blueprint $table) {
            $table->string('share_name');
            $table->string('used_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pointlog', function (Blueprint $table) {
            $table->dropColumn('share_name');
            $table->dropColumn('used_name');
        });
    }
}
