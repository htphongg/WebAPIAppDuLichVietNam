<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableKhongYeuThichBaiViet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khong_yeu_thich_bai_viet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nguoi_dung_id');
            $table->integer('bai_viet_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khong_yeu_thich_bai_viet');
    }
}
