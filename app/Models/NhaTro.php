<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaTro extends Model
{
    use HasFactory;

    protected $table = 'nha_tro';

    public function diaDanh()
    {
        return $this->belongsTo('App\Models\DiaDanh');
    }

    public function dsHinhAnh()
    {
        return $this->hasMany('App\Models\AnhNhaTro');
    }
}
