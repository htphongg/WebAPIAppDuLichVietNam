<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhBaiViet extends Model
{
    use HasFactory;
    protected $table = 'anh_bai_viet';
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function baiViet()
    {
        return $this->belongsTo('App\Models\BaiViet');
    }
}
