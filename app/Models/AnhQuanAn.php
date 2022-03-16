<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhQuanAn extends Model
{
    use HasFactory;

    protected $table = 'anh_quan_an';
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function quanAn()
    {
        return $this->belongsTo('App\Models\QuanAn');
    }
}
