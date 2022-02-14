<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NguoiDung;
use App\Models\BaiViet;
use App\Models\YeuThichBaiViet;
use App\Models\DiaDanh;
use App\Models\KhongYeuThichBaiViet;
use Carbon\Carbon;


class BaiVietController extends Controller
{
    public function layThongTinNguoiViet($nguoi_dung_id)
    {
        $thongTinNgDung = NguoiDung::find($nguoi_dung_id);
        return json_encode($thongTinNgDung);
    }


    public function layTTinDiaDanh($dia_danh_id)
    {
        $diaDanh = DiaDanh::find($dia_danh_id);
        return json_encode($diaDanh);
    }


    public function layDsAnhBaiViet($bai_viet_id)
    {
        $dsHinhAnh = BaiViet::find($bai_viet_id)->dsHinhAnh;
        return json_encode($dsHinhAnh);
    }   

    public function layTatCaBaiViet()
    {
        $dsBaiViet = BaiViet::orderBy('ngay_dang','desc')->get();
        return json_encode($dsBaiViet);
    }

    public function layBaiVietNoiBat()
    {
        $dsBaiVietNoiBat = BaiViet::where('so_luot_thich','>=',100)->orderBy('ngay_dang','desc')->get();
        return json_encode($dsBaiVietNoiBat);
    }

    public function likeBaiViet($bai_viet_id,$nguoi_dung_id)
    {
        $success = [ "state" => "true"];
                    
        $failed = ["state" => "false"];

        if($bai_viet_id != null && $nguoi_dung_id != null)
        {
            $baiViet = BaiViet::find($bai_viet_id);

            $baiViet->nguoi_dung()->attach($nguoi_dung_id);

            $baiViet->so_luot_thich += 1;
            $baiViet->save();

            return json_encode([$success]);
        }
        else
            return json_encode([$failed]);
    }

    public function unlikeBaiViet($bai_viet_id, $nguoi_dung_id)
    {
        $success = [ "state" => "true"];
                    
        $failed = ["state" => "false"];


        if($bai_viet_id != null && $nguoi_dung_id != null)
        {
            $baiViet = BaiViet::find($bai_viet_id);

            $baiViet->nguoi_dung()->detach($nguoi_dung_id);
    
            $baiViet->so_luot_thich -= 1;
            $baiViet->save();

            return json_encode([$success]);
        }
        else
            return json_encode([$failed]);
    }

    public function dislike($bai_viet_id,$nguoi_dung_id)
    {
        $success = [ "state" => "true"];
                    
        $failed = ["state" => "false"];


        if($bai_viet_id != null && $nguoi_dung_id != null)
        {
            $baiViet = BaiViet::find($bai_viet_id);

            $baiViet->nguoi_dung_dislike()->attach($nguoi_dung_id);
    
            $baiViet->save();

            return json_encode([$success]);
        }
        else
            return json_encode([$failed]);
    }

    public function undislike($bai_viet_id,$nguoi_dung_id)
    {
        $success = [ "state" => "true"];
                    
        $failed = ["state" => "false"];


        if($bai_viet_id != null && $nguoi_dung_id != null)
        {
            $baiViet = BaiViet::find($bai_viet_id);

            $baiViet->nguoi_dung_dislike()->detach($nguoi_dung_id);
    
            $baiViet->save();

            return json_encode([$success]);
        }
        else
            return json_encode([$failed]);
    }

    public function layTrangThaiThichBaiViet($bai_viet_id, $nguoi_dung_id)
    {
        $success = [ "state" => "true"];
                    
        $failed = ["state" => "false"];

        $like = YeuThichBaiViet::where('bai_viet_id','=',$bai_viet_id)->where('nguoi_dung_id','=',$nguoi_dung_id)->first();
        if($like != null)
            return json_encode([$success]);
        else
            return json_encode([$failed]);
    }

    public function layTrangThaiKhongThichBaiViet($bai_viet_id, $nguoi_dung_id)
    {
        $success = [ "state" => "true"];
                    
        $failed = ["state" => "false"];

        $like = KhongYeuThichBaiViet::where('bai_viet_id','=',$bai_viet_id)->where('nguoi_dung_id','=',$nguoi_dung_id)->first();
        if($like != null)
            return json_encode([$success]);
        else
            return json_encode([$failed]);
    }

    public function vietBai($nguoi_dung_id, $dia_danh_id, $tieude, $noidung)
    {

        $success = [ "state" => "true", "message" => "Viết bài đánh giá thành công."];
                    
        $failed = ["state" => "false","message" => "Viết bài đánh giá thất bại"];

        if($nguoi_dung_id != null && $dia_danh_id != null && $tieude != null && $noidung != null)
        {
            

            $baiViet = new BaiViet();
            
            $baiViet->tieu_de = $tieude;
            $baiViet->noi_dung = $noidung;
            $baiViet->ngay_dang = Carbon::now('Asia/Ho_Chi_Minh');
            $baiViet->dia_danh_id = $dia_danh_id;
            $baiViet->nguoi_dung_id = $nguoi_dung_id;
            $baiViet->so_luot_thich = "0";

            $diaDanh = DiaDanh::find($dia_danh_id);
            $diaDanh->luot_checkin+= 1;
            $diaDanh->save();
            
            $baiViet->save();

            return json_encode([$success]);
        }
        else
            return json_encode([$failed]);
    }
}