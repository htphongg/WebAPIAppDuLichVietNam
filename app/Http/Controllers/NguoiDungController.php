<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NguoiDungController extends Controller
{
   
    public function dangNhap($username, $password)
    {
        $success = [ "state" => "true",
                    "message" => "Đăng nhập thành công."];

        $failed = ["state" => "false",
                    "message" => "Tài khoản hoặc mật khẩu không đúng." ];

        if (Auth::attempt(['ten_dang_nhap' => $username, 'password' => $password])) 
        {
            $user = Auth::user();
            return json_encode([$success,$user]);  
        }
        else
            return json_encode([$failed]);

    }

    public function layThongTinNgDung($nguoi_dung_id)
    {
       $ngDung = NguoiDung::find($nguoi_dung_id);
       return json_encode($ngDung);
        
    }

    public function dangKy($username,$password,$cfpassword,$hoten,$email,$sdt)
    {
        $username_null = [
                    "state" => "false",
                    "message" => "Tên đăng nhập không được để trống" ];

        $password_null = [
                    "state" => "false",
                    "message" => "Mật khẩu không được để trống"];

        $cfpassword_null = [
                    "state" => "false",
                    "message" => "Xác nhận mật khẩu không được để trống"];

        $cfpwf_failed = [
                    "state" => "false",
                    "message" => "Xác nhận mật khẩu không đúng"];

        $success = [ "state" => "true",
                    "message" => "Đăng ký thành công. Đăng nhập ngay nào !"];
                    
        $failed = ["state" => "false",
                    "message" => "Đăng ký thất bại." ];


        if($username == "")
            return json_encode([$username_null]);
        if($password_null == "")
            return json_encode([$username_null]);
        if($cfpassword_null == "")
            return json_encode([$username_null]);
        
        if(strcmp($password,$cfpassword) == 0)
        {           
            $ngDung = new NguoiDung();

            $ngDung->avt = 'https://img.favpng.com/25/13/19/samsung-galaxy-a8-a8-user-login-telephone-avatar-png-favpng-dqKEPfX7hPbc6SMVUCteANKwj.jpg';
            $ngDung->ten_dang_nhap = $username;
            $ngDung->mat_khau =  Hash::make($password);
            $ngDung->ho_ten = $hoten;
            $ngDung->email = $email;
            $ngDung->so_dien_thoai = $sdt;
            $ngDung->trang_thai_email = 1;
            $ngDung->trang_thai_sdt = 1;

            $ngDung->save();

            return json_encode([$success]);
        }
        else
            return json_encode([$cfpwf_failed]);
    }

    public function layDsDiaDanhDaThich($nguoi_dung_id)
    {
        $dsDiaDanhDaThich =  NguoiDung::find($nguoi_dung_id)->dsDiaDanhDaThich;
        return json_encode($dsDiaDanhDaThich);
    }

    public function layDsBaiViet($nguoi_dung_id)
    {
        $dsBaiViet = NguoiDung::find($nguoi_dung_id)->dsBaiViet;
        return json_encode($dsBaiViet);
    }

    public function capNhatThongTinCaNhan($nguoi_dung_id, $ho_ten,$email,$sodienthoai)
    {

        $success = [ "state" => "true",
                     "message" => "Cập nhật thành công."];

        $failed = ["state" => "false",
                     "message" => "Cập nhật thất bại." ];

        if($nguoi_dung_id != null && $ho_ten != null && $email != null && $sodienthoai != null)
        {
            $ngDung = NguoiDung::find($nguoi_dung_id);

            $ngDung->ho_ten = $ho_ten;
            $ngDung->email = $email;
            $ngDung->so_dien_thoai = $sodienthoai;
    
            $ngDung->save();

            return json_encode([$success]);
        }
        else
            return json_encode([$failed]);
    }

    public function doiMatKhau($nguoi_dung_id, $old_pass, $new_pass, $cf_new_pass)
    {
        $success = [ "state" => "true","message" => "Thay đổi mật khẩu thành công. Vui lòng đăng nhập lại."];

        $failed = ["state" => "false","message" => "Thay đổi mật khẩu thất bại." ];

        $old_pass_wrong = ["state" => "false", "message" => "Mật khẩu cũ không đúng."];
        $cf_new_pass_wrong = ["state" => "false", "message" => "Xác nhận mật khẩu mới không đúng."];

        if($nguoi_dung_id != null && $old_pass != null && $new_pass != null && $cf_new_pass != null )
        {
            $ngDung = NguoiDung::find($nguoi_dung_id);
            if(Hash::check($old_pass, $ngDung->mat_khau))
            {
                if($new_pass == $cf_new_pass)
                {
                    $ngDung->mat_khau = Hash::make($new_pass);

                    $ngDung->save();

                    return json_encode([$success]);
                }
                else
                    return json_encode([$cf_new_pass_wrong]);
            }
            else
                return json_encode([$old_pass_wrong]);
        }
        else
            return json_encode([$failed]);
    }

    public function capNhatHienThiEmail($nguoi_dung_id)
    {
        $ngDung = NguoiDung::find($nguoi_dung_id);
        if($ngDung->trang_thai_email == 1)
            $ngDung->trang_thai_email = 0;
        else
            $ngDung->trang_thai_email = 1;
        $ngDung->save();
        return;
    }

    public function capNhatHienThiSdt($nguoi_dung_id)
    {
        $ngDung = NguoiDung::find($nguoi_dung_id);
        if($ngDung->trang_thai_sdt == 1)
            $ngDung->trang_thai_sdt = 0;
        else
            $ngDung->trang_thai_sdt = 1;
        $ngDung->save();
        return;
    }

    public function dangXuat()
    {  
        $success = ["state" => "true", "message" => "Đăng xuất thành công" ];
        if(Auth::check())
            return json_encode([$success]);
        else
            return "Chưa đăng nhập";
    }
}
