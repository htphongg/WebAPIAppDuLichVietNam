<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonAn extends Model
{
    use HasFactory;

    protected $table = 'mon_an';
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function diaDanh()
    {
        return $this->belongsTo('App\Models\DiaDanh');
    }

    public function dsHinhAnh()
    {
        return $this->hasMany('App\Models\AnhMonAn');
    }

    public function quanAn()
    {
        return $this->belongsTo('App\Models\QuanAn');
    }

}
