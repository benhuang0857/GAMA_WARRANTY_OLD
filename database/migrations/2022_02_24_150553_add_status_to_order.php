<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->string('status')->default('unused');
            $table->datetime('click_time')->default('9999-12-12 00:00:00');
            $table->datetime('end_time')->default('9999-12-12 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('click_time');
            $table->dropColumn('end_time');
        });
    }
}
