<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointlog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_uniqid');
            $table->integer('point');
            $table->string('status')->default('OFF')->comment('ON/OFF');
            $table->string('note')->nullable();
            $table->string('used')->default('NO')->comment('NO/YES');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pointlog');
    }
}
