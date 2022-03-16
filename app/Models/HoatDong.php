<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoatDong extends Model
{
    use HasFactory;
    protected $table = 'hoat_dong';
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function dsDiaDanh()
    {
        return $this->belongsToMany('App\Models\DiaDanh','hoat_dong_dia_danh')->withPivot('hoat_dong_id','dia_danh_id');
    }
}
