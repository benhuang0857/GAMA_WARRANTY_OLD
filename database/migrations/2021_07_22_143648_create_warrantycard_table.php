<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarrantycardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty_card', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_id')->comment('保卡卡號唯一');
            $table->string('warranty_id')->comment('連動warranty'); #這邊是Ref Warranty Table，為了抓取版型
            $table->string('name');
            $table->string('mobile');
            $table->string('location');
            $table->string('email');
            $table->string('construction_by')->comment('施工者');
            $table->date('construction_date')->default('1900-01-01')->comment('施工日期');
            $table->text('warranty_body')->comment('放保卡內容json');
            $table->string('price')->comment('施工價格');
            $table->string('recommand_user_name')->default('Nobody');
            $table->string('status')->default('OFF')->comment('ON/OFF');
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
        Schema::dropIfExists('warrantycard');
    }
}
