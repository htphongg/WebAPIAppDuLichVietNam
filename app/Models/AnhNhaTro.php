<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnhNhaTro extends Model
{
    use HasFactory;
    protected $table = 'anh_nha_tro';
    protected $hidden = ['created_at','updated_at','deleted_at'];


    public function nhaTro()
    {
        return $this->belongsTo('App\Models\NhaTro');
    }
}
