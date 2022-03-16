<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;
    protected $table = 'bai_viet';
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function diaDanh()
    {
        return $this->belongsTo('App\Models\DiaDanh');
    }

    public function dsHinhAnh()
    {
        return $this->hasMany('App\Models\AnhBaiViet');
    }

    public function nguoiDung()
    {
        return $this->belongsTo('App\Models\NguoiDung');
    }

    public function nguoi_dung()
    {
        return $this->belongsToMany('App\Models\NguoiDung','yeu_thich_bai_viet')->withTimestamps();
    }

    public function nguoi_dung_dislike()
    {
        return $this->belongsToMany('App\Models\NguoiDung','khong_yeu_thich_bai_viet')->withTimestamps();
    }

    public function dsNguoiDungDaThich()
    {
        return $this->belongsToMany('App\Models\NguoiDung','yeu_thich_bai_viet')->withPivot('nguoi_dung_id','bai_viet_id');
    }

    public function dsNguoiDungKhongThich()
    {
        return $this->belongsToMany('App\Models\NguoiDung','khong_yeu_thich_bai_viet')->withPivot('nguoi_dung_id','bai_viet_id');
    }
}
