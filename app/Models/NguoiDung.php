<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NguoiDung extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['mat_khau'];
    protected $table = 'nguoi_dung';
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function getPasswordAttribute()
    {
        return $this->mat_khau;
    }

    public function dsDiaDanhDaThich()
    {
        return $this->belongsToMany('App\Models\DiaDanh','yeu_thich_dia_danh');
    }

    public function dsBaiViet()
    {
        return $this->hasMany('App\Models\BaiViet');
    }

    public function dsBaiVietDaThich()
    {
        return $this->belongsToMany('App\Models\BaiViet');
    }
}
