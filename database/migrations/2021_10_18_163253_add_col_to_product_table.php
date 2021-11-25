<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->string('category')->default('SUN');
            $table->string('series')->default('NO');
            $table->integer('gama_point')->default(0);
            $table->integer('warranty_time')->default(5);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('series');
            $table->dropColumn('gama_point');
            $table->dropColumn('warranty_time');
        });
    }
}
