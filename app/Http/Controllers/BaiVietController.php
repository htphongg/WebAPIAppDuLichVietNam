<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NguoiDung;
use App\Models\BaiViet;
use App\Models\AnhBaiViet;
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

    public function vietBai(Request $req)
    {
        $success = [ "state" => "true", "message" => "Viết bài đánh giá thành công."];
                    
        $failed = ["state" => "false","message" => "Viết bài đánh giá thất bại"];

        if($req->user_id != null && $req->dia_danh_id != null && $req->tieu_de != null && $req->noi_dung != null)
        {
            //Tao bai viet
            $baiViet = new BaiViet();
            
            $baiViet->tieu_de = $req->tieu_de;
            $baiViet->noi_dung = $req->noi_dung;
            $baiViet->ngay_dang = Carbon::now('Asia/Ho_Chi_Minh');
            $baiViet->dia_danh_id = $req->dia_danh_id;
            $baiViet->nguoi_dung_id = $req->user_id;
            $baiViet->rate = $req->rate;
            $baiViet->so_luot_thich = "0";
            $baiViet->save();

            //Theem luot checkin
            $diaDanh = DiaDanh::find($req->dia_danh_id);
            $diaDanh->luot_checkin+= 1;
            $diaDanh->save();

            //Them anh dia danh
            if($req->images != null)
            {
                $anhDiaDanh = new AnhBaiViet();

                $anhDiaDanh->path = "https://travellappp.herokuapp.com/anhbaiviet/$baiViet->id/" .$req->images->getClientOriginalName();
                $req->images->storeAs("anhbaiviet/$baiViet->id", $req->images->getClientOriginalName());
                $anhDiaDanh->bai_viet_id = $baiViet->id;

                $anhDiaDanh->save();
            }
        
            return response()->json($success, 200, $success);
        }
        else
            return response()->json($failed, 200,$failed );
    }
}
