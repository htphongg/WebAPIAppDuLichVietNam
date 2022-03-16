<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoatDongDiaDanh extends Model
{
    use HasFactory;
    protected $table = 'hoat_dong_dia_danh';
    protected $hidden = ['created_at','updated_at','deleted_at'];

}
