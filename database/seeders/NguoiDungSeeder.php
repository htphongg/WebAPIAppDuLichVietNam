<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NguoiDung::insert([
            'avt' => 'https://hinhnen123.com/wp-content/uploads/2021/06/anh-meo-cute-nhat-9.jpg',
            'ten_dang_nhap' => 'htngan',
            'mat_khau' => Hash::make('123456'),
            'ho_ten' => 'Huỳnh Thanh Ngân',
            'email' => 'htngan@gmail.com.vn',
            'so_dien_thoai' => '138856654',
            'trang_thai_hien_thi' => 'Công khai',
        ]);
    }
}
