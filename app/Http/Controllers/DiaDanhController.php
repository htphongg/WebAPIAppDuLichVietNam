<?php

namespace App\Http\Controllers;

use App\Models\DiaDanh;
use App\Models\Mien;
use App\Models\Vung;
use App\Models\MonAn;
use App\Models\QuanAn;
use App\Models\NguoiDung;
use App\Models\NhaTro;
use App\Models\HoatDong;
use App\Models\AnhDiaDanh;
use App\Models\YeuThichDiaDanh;
use App\Models\HoatDongDiaDanh;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DiaDanhController extends Controller
{
    public function xemDsDiaDanh()
    {
        $dsDiaDanh = DiaDanh::where('trang_thai_cho','=',1)->get();
      
        return view('ds-dia-danh',compact('dsDiaDanh'));
    }
    
    public function layDsDiaDanhDangChoDuyet()
    {
        $dsDiaDanh = DiaDanh::where('trang_thai_cho','=',0)->get();
        return view('ds-dia-danh-cho',compact('dsDiaDanh'));
    }

    public function chapNhanDiaDanh($dia_danh_id)
    {
        if($dia_danh_id != null)
        {
            DiaDanh::where('id','=',$dia_danh_id)->update(['trang_thai_cho' => true]);

            return redirect()->back();
        }
        else
            return 'Xét duyệt thất bại';
    }

    public function formthemAnhDiaDanh($dia_danh_id)
    {
        
        return view('them-anh',['dia_danh_id' => $dia_danh_id]);
    }

    public function xulythemAnhDiaDanh(Request $req, $dia_danh_id)
    {
        if($req->anh1 != null)
        {
            $anhDiaDanh = new AnhDiaDanh();
            $anhDiaDanh->path = $req->anh1;
            $anhDiaDanh->dia_danh_id = $dia_danh_id;
            $anhDiaDanh->save();
        }

        if($req->anh2 != null)
        {
            $anhDiaDanh = new AnhDiaDanh();
            $anhDiaDanh->path = $req->anh2;
            $anhDiaDanh->dia_danh_id = $dia_danh_id;
            $anhDiaDanh->save();
        }

        if($req->anh3 != null)
        {
            $anhDiaDanh = new AnhDiaDanh();
            $anhDiaDanh->path = $req->anh3;
            $anhDiaDanh->dia_danh_id = $dia_danh_id;
            $anhDiaDanh->save();
        }

        if($req->anh4 != null)
        {
            $anhDiaDanh = new AnhDiaDanh();
            $anhDiaDanh->path = $req->anh4;
            $anhDiaDanh->dia_danh_id = $dia_danh_id;
            $anhDiaDanh->save();
        }

        if($req->anh5 != null)
        {
            $anhDiaDanh = new AnhDiaDanh();
            $anhDiaDanh->path = $req->anh5;
            $anhDiaDanh->dia_danh_id = $dia_danh_id;
            $anhDiaDanh->save();
        }

        if($req->anh6 != null)
        {
            $anhDiaDanh = new AnhDiaDanh();
            $anhDiaDanh->path = $req->anh6;
            $anhDiaDanh->dia_danh_id = $dia_danh_id;
            $anhDiaDanh->save();
            
        }

        return redirect()->route('xem-ds-dia-danh');
    }

    public function formThemDiaDanh()
    {
        $dsMien = Mien::all();
        $dsVung = Vung::all();
        return view('them-dia-danh',compact('dsMien','dsVung'));
    }

    public function xuLyThemDiaDanh(Request $req)
    {
        if($req->tendiadanh != null && $req->avt != null && $req->mota != null && $req->mien != null && $req->vung && $req->kinhdo && $req->vido)
        {
            $diaDanh = new DiaDanh();

            $diaDanh->avt = $req->avt;
            $diaDanh->ten = $req->tendiadanh;
            $diaDanh->mo_ta = $req->mota;
            $diaDanh->mien_id = $req->mien;
            $diaDanh->vung_id = $req->vung;
            $diaDanh->luot_checkin = 0;
            $diaDanh->luot_thich = 0;
            $diaDanh->kinh_do = $req->kinhdo;
            $diaDanh->vi_do = $req->vido;
            $diaDanh->trang_thai_cho = true;

            $diaDanh->save();
            return redirect()->route('xem-ds-dia-danh');
        }   
        else
            return "Thêm thất bại";
    }

    public function formChinhSuaDiaDanh($dia_danh_id)
    {
        $diaDanh = DiaDanh::find($dia_danh_id);
        $dsMien = Mien::all();
        $dsVung = Vung::all();
        return view('chinh-sua-dia-danh',compact('diaDanh','dsMien','dsVung'));
    }

    public function xuLyChinhSuaDiaDanh(Request $req, $dia_danh_id)
    {
        if($req->tendiadanh != null && $req->avt != null && $req->mota != null && $req->mien != null && $req->vung && $req->kinhdo && $req->vido)
        {
            $diaDanh = DiaDanh::find($dia_danh_id);

            $diaDanh->avt = $req->avt;
            $diaDanh->ten = $req->tendiadanh;
            $diaDanh->mo_ta = $req->mota;
            $diaDanh->mien_id = $req->mien;
            $diaDanh->vung_id = $req->vung;
            $diaDanh->kinh_do = $req->kinhdo;
            $diaDanh->vi_do = $req->vido;

            $diaDanh->save();
            return redirect()->route('xem-ds-dia-danh');
        }   
        else
            return "Chỉnh sửa thất bại";
    }

    public function xoaDiaDanh($dia_danh_id)
    {
        if($dia_danh_id != null)
        {
            DiaDanh::find($dia_danh_id)->delete();

            return redirect()->route('xem-ds-dia-danh');
        }
        else
            return "Xoá thất bại";
    }

    //API
    public function layThongTinDiaDanh($dia_danh_id)
    {
        $dia_danh = DiaDanh::find($dia_danh_id)->exclute('deleted_at');      
        return json_encode($dia_danh);
    }

    public function layDsAnhDiaDanh($dia_danh_id)
    {
        $dia_danh = DiaDanh::find($dia_danh_id);       
        return json_encode($dia_danh->dsHinhAnh);
    }

    public function layDsDiaDanh()
    {
        $dsDiaDanh = DiaDanh::where('trang_thai_cho','=',1)->orderBy('luot_thich','desc')->get();
       
        return json_encode($dsDiaDanh);
    }

    public function layDsDiaDanhHot()
    {
        $dsDiaDanh = DiaDanh::all();

        $dsDiaDanhHot = [];

        foreach($dsDiaDanh as $diaDanh)
        {
            if($diaDanh->luot_thich >= 700)
            {
                array_push($dsDiaDanhHot,$diaDanh);
            }
        }
        return json_encode($dsDiaDanhHot);
    }

    public function layDsDiaDanhTheoMien($mien_id){
        $dsDiaDanh = Mien::find($mien_id)->dsDiaDanh;
        return json_encode($dsDiaDanh);
    }

    public function layDsDiaDanhTheoVung($vung_id){
        $dsDiaDanh = Vung::find($vung_id)->dsDiaDanh;
        return json_encode($dsDiaDanh);
    }

    public function layDsMonAn($dia_danh_id)
    {
        $dsMonAn = DiaDanh::find($dia_danh_id)->dsMonAn;
        return json_encode($dsMonAn);
    }

    public function layDsQuanAn($dia_danh_id)
    {
        $dsQuanAn = DiaDanh::find($dia_danh_id)->dsQuanAn;
        return json_encode($dsQuanAn);
    }

    public function layDsNhaTro($dia_danh_id)
    {
        $dsNhaTro = DiaDanh::find($dia_danh_id)->dsNhaTro;
        return json_encode($dsNhaTro);
    }

    public function layDsBaiViet($dia_danh_id)
    {
        $dsBaiViet = DiaDanh::find($dia_danh_id)->dsBaiViet->sortDesc()->values()->all();
        return json_encode($dsBaiViet);
    }

    public function likeDiaDanh($dia_danh_id,$nguoi_dung_id)
    {

        $success = [ "state" => "true"];
                    
        $failed = ["state" => "false"];

        if($dia_danh_id != null && $nguoi_dung_id != null)
        {
            $diaDanh = DiaDanh::find($dia_danh_id);

            $diaDanh->nguoi_dung()->attach($nguoi_dung_id);

            $diaDanh->luot_thich += 1;
            $diaDanh->save();

            return json_encode([$success]);

        }
        else
            return json_encode([$failed]);
       
    }

    public function unlikeDiaDanh($dia_danh_id,$nguoi_dung_id)
    {

        $success = [ "state" => "true"];
                    
        $failed = ["state" => "false"];


        if($dia_danh_id != null && $nguoi_dung_id != null)
        {
            $diaDanh = DiaDanh::find($dia_danh_id);

            $diaDanh->nguoi_dung()->detach($nguoi_dung_id);
    
            $diaDanh->luot_thich -= 1;
            $diaDanh->save();

            return json_encode([$success]);
        }
        else
            return json_encode([$failed]);
    }

    public function layDsDiaDanhMoi()
    {       
        $now =  (Carbon::now('Asia/Ho_Chi_Minh'));
        $dsDiaDanhMoi = [];

        $dsDiaDanh = DiaDanh::where('trang_thai_cho','=',1)->get();

        foreach($dsDiaDanh as $diaDanh)
        {
           if( $diaDanh->created_at->format('d') >= Carbon::now()->day - 3 &&  $diaDanh->created_at->format('d') <= Carbon::now()->day)
           {
                array_push($dsDiaDanhMoi,$diaDanh);
           }
        
        }
        return json_encode($dsDiaDanhMoi);
    }

    public function layTrangThaiThich($dia_danh_id,$id_user)
    {
        $success = [ "state" => "true"];
                    
        $failed = ["state" => "false"];

        $like = YeuThichDiaDanh::where('dia_danh_id','=',$dia_danh_id)->where('nguoi_dung_id','=',$id_user)->first();
        if($like != null)
            return json_encode([$success]);
        else
            return json_encode([$failed]);
    }

    public function themDiaDanhVaoDsCho($ten_dia_danh,$mo_ta,$vung, $mien, $hoat_dong,$kinh_do,$vi_do)
    {
        $success = [ "state" => "true","message" => "Gửi thành công. Quản trị viên sẽ duyệt thông tin của bạn trong vài ngày tới."];
                    
        $failed = ["state" => "false","message" => "Gửi thất bại."];

        if($ten_dia_danh != null && $mo_ta != null 
        && $vung != null && $mien != null && $hoat_dong != null && $kinh_do != null && $vi_do != null)
        {
            $diaDanh = new DiaDanh();

            $mienn = Mien::where('ten','=',$mien)->first();
            $vungg = Vung::where('ten','=',$vung)->first();
            $hoatdongg = HoatDong::where('ten','=',$hoat_dong)->first();

            $diaDanh->avt = "";
            $diaDanh->ten = $ten_dia_danh;
            $diaDanh->mo_ta = $mo_ta;
            $diaDanh->mien_id = $mienn->id;
            $diaDanh->vung_id = $vungg->id;
            $diaDanh->luot_checkin = 0;
            $diaDanh->luot_thich = 0;
            $diaDanh->kinh_do = $kinh_do;
            $diaDanh->vi_do = $vi_do;
            $diaDanh->trang_thai_cho = false;

            $diaDanh->save();

            $hdDiaDanh = new HoatDongDiaDanh();

            $hdDiaDanh->dia_danh_id = $diaDanh->id;
            $hdDiaDanh->hoat_dong_id = $hoatdongg->id;

            $hdDiaDanh->save();
            return json_encode([$success]);
        }
        else
            return json_encode([$failed]);
    }

}
