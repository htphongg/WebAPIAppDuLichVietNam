<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaDanh extends Model
{
    use HasFactory;
    protected $table = 'dia_danh';
    protected $fillable = ['luot_thich'];
    protected $hidden = ['created_at','updated_at','deleted_at'];

    public function dsHinhAnh()
    {
        return $this->hasMany('App\Models\AnhDiaDanh');
    }

    public function dsMonAn()
    {
        return $this->hasMany('App\Models\MonAn');
    }

    public function dsQuanAn()
    {
        return $this->hasMany('App\Models\QuanAn');
    }

    public function dsNhaTro()
    {
        return $this->hasMany('App\Models\NhaTro');
    }

    public function dsHoatDong()
    {
        return $this->belongsToMany('App\Models\HoatDong','hoat_dong_dia_danh');
    }

    public function mien()
    {
        return $this->belongsTo('App\Models\Mien');
    }

    public function vung()
    {
        return $this->belongsTo('App\Models\Vung');
    }

    public function dsBaiViet()
    {   
        return $this->hasMany('App\Models\BaiViet');
    }

    public function dsNguoiDaThich()
    {
        return $this->belongsToMany('App\Models\NguoiDung','yeu_thich_dia_danh')->withPivot('dia_danh_id','nguoi_dung_id');
    }

    public function nguoi_dung()
    {
        return $this->belongsToMany('App\Models\NguoiDung','yeu_thich_dia_danh')->withTimestamps();
    }
}
