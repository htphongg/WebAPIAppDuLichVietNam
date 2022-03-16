<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DatabaseAppDuLich extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avt');
            $table->string('ten_dang_nhap');
            $table->string('mat_khau');
            $table->string('ho_ten');    
            $table->string('email');    
            $table->boolean('trang_thai_email');
            $table->string('so_dien_thoai');    
            $table->boolean('trang_thai_sdt'); 
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('yeu_thich_dia_danh', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nguoi_dung_id');
            $table->integer('dia_danh_id');      
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('yeu_thich_bai_viet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nguoi_dung_id');
            $table->integer('bai_viet_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('dia_danh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avt');
            $table->string('ten');
            $table->string('mo_ta',1000);
            $table->integer('mien_id');
            $table->integer('vung_id');
            $table->integer('luot_checkin');
            $table->integer('luot_thich');
            $table->double('kinh_do');
            $table->double('vi_do');
            $table->boolean('trang_thai_cho');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('anh_dia_danh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('dia_danh_id');          
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('hoat_dong_dia_danh', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hoat_dong_id');
            $table->integer('dia_danh_id');                     
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('nha_tro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avt');
            $table->string('ten');
            $table->string('mo_ta',1000);
            $table->double('gia');
            $table->string('dia_chi');
            $table->integer('dia_danh_id');         
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('anh_nha_tro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('nha_tro_id');
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('mon_an', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avt');
            $table->string('ten');
            $table->string('mo_ta',1000);
            $table->double('gia');
            $table->integer('quan_an_id');
            $table->integer('dia_danh_id'); 
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('anh_mon_an', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('mon_an_id');
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('quan_an', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avt');
            $table->string('ten');
            $table->string('mo_ta',1000);
            $table->string('dia_chi');
            $table->integer('dia_danh_id'); 
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('anh_quan_an', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('quan_an_id');
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('mien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('vung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('anh_bai_viet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('bai_viet_id');          
            $table->timestamps();
            $table->softDeletes();
        });

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

        Schema::create('hoat_dong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');  
            $table->timestamps();
            $table->softDeletes();
        });

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
        Schema::dropIfExists('nguoi_dung');
        Schema::dropIfExists('yeu_thich_dia_danh');
        Schema::dropIfExists('anh_bai_viet');
        Schema::dropIfExists('dia_danh');
        Schema::dropIfExists('anh_dia_danh');
        Schema::dropIfExists('hoat_dong_dia_danh');
        Schema::dropIfExists('nha_tro');
        Schema::dropIfExists('anh_nha_tro');
        Schema::dropIfExists('quan_an');
        Schema::dropIfExists('anh_quan_an');
        Schema::dropIfExists('mon_an');
        Schema::dropIfExists('anh_mon_an');
        Schema::dropIfExists('vung');
        Schema::dropIfExists('mien');
        Schema::dropIfExists('bai_viet');
        Schema::dropIfExists('hoat_dong');
        Schema::dropIfExists('yeu_thich_bai_viet');
        Schema::dropIfExists('khong_yeu_thich_bai_viet');
    }
}
