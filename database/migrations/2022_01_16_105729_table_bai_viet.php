<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableBaiViet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('bai_viet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieu_de');
            $table->string('noi_dung',1000);
            $table->date('ngay_dang');
            $table->integer('dia_danh_id');
            $table->integer('nguoi_dung_id');
            $table->string('so_luot_thich');
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
        Schema::dropIfExists('bai_viet');
    }
}
