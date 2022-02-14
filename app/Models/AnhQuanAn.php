<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhQuanAn extends Model
{
    use HasFactory;

    protected $table = 'anh_quan_an';

    public function quanAn()
    {
        return $this->belongsTo('App\Models\QuanAn');
    }
}
