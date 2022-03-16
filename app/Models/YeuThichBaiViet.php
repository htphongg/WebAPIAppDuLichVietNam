<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuThichBaiViet extends Model
{
    use HasFactory;
    protected $table = 'yeu_thich_bai_viet';
    protected $hidden = ['created_at','updated_at','deleted_at'];

}
