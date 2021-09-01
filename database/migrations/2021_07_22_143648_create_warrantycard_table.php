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
            $table->string('check_code')->comment('檢查碼');
            $table->string('card_id')->comment('保卡卡號唯一');
            $table->string('user_uniqid')->comment('顧客唯一ID');
            $table->string('name')->comment('顧客姓名');
            $table->string('mobile')->comment('顧客手機');
            $table->string('address')->comment('顧客地址');
            $table->string('email')->comment('顧客email');
            $table->string('car_license')->comment('車牌');
            $table->string('car_brand')->comment('車品牌');
            $table->string('warranty_type')->comment('保卡樣式');
            $table->string('construction_by')->comment('施工者');
            $table->date('construction_date')->default('1900-01-01')->comment('施工日期');
            $table->text('warranty_body')->comment('放保卡內容json');
            $table->string('price')->comment('施工價格');
            $table->string('recommand_user_id')->default('Nobody');
            $table->string('status')->default('OFF')->comment('ON/OFF');
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
            $table->string('card_pic_src')->nullable();
            $table->string('has_enabled')->default('no');
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
