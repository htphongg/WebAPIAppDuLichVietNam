<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhongYeuThichBaiViet extends Model
{
    use HasFactory;
    protected $table = 'khong_yeu_thich_bai_viet';
    protected $hidden = ['created_at','updated_at','deleted_at'];

}
