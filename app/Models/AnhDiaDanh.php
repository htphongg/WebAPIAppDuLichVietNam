<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhDiaDanh extends Model
{
    use HasFactory;
    protected $table = 'anh_dia_danh';

    public function diaDanh()
    {
        return $this->belongsTo('App\Models\DiaDanh');
    }
}
