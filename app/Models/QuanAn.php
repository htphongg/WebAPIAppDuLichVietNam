<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuanAn extends Model
{
    use HasFactory;

    protected $table = 'quan_an';
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function diaDanh()
    {
        return $this->belongsTo('App\Models\DiaDanh');
    }

    public function dsHinhAnh()
    {
        return $this->hasMany('App\Models\AnhQuanAn');
    }

    public function dsMonAn()
    {
        return $this->hasMany('App\Models\MonAn');
    }
}
