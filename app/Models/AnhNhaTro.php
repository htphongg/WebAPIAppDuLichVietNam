<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhNhaTro extends Model
{
    use HasFactory;
    protected $table = 'anh_nha_tro';

    public function nhaTro()
    {
        return $this->belongsTo('App\Models\NhaTro');
    }
}
