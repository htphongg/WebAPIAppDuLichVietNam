<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiaDanh;

class DiaDanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiaDanh::insert([
            'ten' => 'Chùa Một Cột',
            'mo_ta' => 'Chùa Một Cột có tên ban đầu là Liên Hoa Đài có tức là Đài Hoa Sen với lối kiến trúc độc đáo".',
            'luot_checkin' => '20',
            'luot_thich' => '845',
            'kinh_do' => '21.0358532',
            'vi_do' => '105.8336228'
        ]);
    }
}
