<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\DiaDanhController;
use App\Http\Controllers\MienController;
use App\Http\Controllers\VungController;
use App\Http\Controllers\MonAnController;
use App\Http\Controllers\QuanAnController;
use App\Http\Controllers\NhaTroController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\HoatDongController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Đăng nhập
Route::get('/login/{username}/{password}',[NguoiDungController::class,'dangNhap'])->name('login');
Route::get('/sign-up/{username}/{password}/{cfpassword}/{hoten}/{email}/{sdt}',[NguoiDungController::class,'dangKy']);

//Người dùng
Route::get('/lay-ds-dia-danh-da-thich/{id}',[NguoiDungController::class,'layDsDiaDanhDaThich']);
Route::get('/ds-bai-viet-ng-dung/{id}',[NguoiDungController::class,'layDsBaiViet']);
Route::get('/thong-tin-ng-dung/{id}',[NguoiDungController::class,'layThongTinNgDung']);
Route::get('/cap-nhat-thong-tin/{id}/{ho_ten}/{email}/{sdt}',[NguoiDungController::class,'capNhatThongTinCaNhan']);
Route::get('doi-mat-khau/{id}/{old_pass}/{new_pass}/{cf_new_pass}',[NguoiDungController::class,'doiMatKhau']);
Route::get('up-state-email/{id}',[NguoiDungController::class,'capNhatHienThiEmail']);
Route::get('up-state-phonenumber/{id}',[NguoiDungController::class,'capNhatHienThiSdt']);


//Địa danh
Route::get('/dia-danh/{id}',[DiaDanhController::class,'layThongTinDiaDanh']);
Route::get('/ds-dia-danh',[DiaDanhController::class,'layDsDiaDanh']);

Route::get('xem-ds-dia-danh',[DiaDanhController::class,'xemDsDiaDanh'])->name('xem-ds-dia-danh');
Route::get('ds-dia-danh-cho-duyet',[DiaDanhController::class,'layDsDiaDanhDangChoDuyet'])->name('ds-dia-danh-cho-duyet');
Route::get('chap-nhan-dia-danh/{id}',[DiaDanhController::class,'chapNhanDiaDanh'])->name('chap-nhan-dia-danh');
Route::get('them-dia-danh',[DiaDanhController::class,'formThemDiaDanh'])->name('form-them-dia-danh');
Route::post('them-dia-danh',[DiaDanhController::class,'xuLyThemDiaDanh'])->name('xl-them-dia-danh');
Route::get('them-dia-danh-cho/{ten}/{mota}/{vung}/{mien}/{hoatdong}/{kinhdo}/{vido}',[DiaDanhController::class,'themDiaDanhVaoDsCho']);
Route::get('chinh-sua-dia-danh/{id}',[DiaDanhController::class,'formChinhSuaDiaDanh'])->name('form-chinh-sua-dia-danh');
Route::post('chinh-sua-dia-danh/{id}',[DiaDanhController::class,'xuLyChinhSuaDiaDanh'])->name('xl-chinh-sua-dia-danh');
Route::get('xoa-dia-danh/{id}',[DiaDanhController::class,'xoaDiaDanh'])->name('xoa-dia-danh');
Route::get('them-anh-dia-danh/{id}',[DiaDanhController::class,'formthemAnhDiaDanh'])->name('form-them-anh');
Route::post('them-anh-dia-danh/{id}',[DiaDanhController::class,'xulythemAnhDiaDanh'])->name('xl-them-anh');

Route::get('/ds-hinh-anh/{id}',[DiaDanhController::class,'layDsAnhDiaDanh']);
Route::get('/ds-dia-danh-hot',[DiaDanhController::class,'layDsDiaDanhHot']);
Route::get('/ds-mon-an-dia-danh/{id}',[DiaDanhController::class,'layDsMonAn']);
Route::get('/ds-quan-an-dia-danh/{id}',[DiaDanhController::class,'layDsQuanAn']);
Route::get('/ds-nha-tro-dia-danh/{id}',[DiaDanhController::class,'layDsNhaTro']);
Route::get('/ds-bai-viet-dia-danh/{id}',[DiaDanhController::class,'layDsBaiViet']);
Route::get('/like/{id}/{userid}',[DiaDanhController::class,'likeDiaDanh']);
Route::get('/unlike/{id}/{userid}',[DiaDanhController::class,'unlikeDiaDanh']);
Route::get('/lay-ds-dia-danh-moi',[DiaDanhController::class,'layDsDiaDanhMoi']);
Route::get('/trang-thai-thich/{id}/{userid}',[DiaDanhController::class,'layTrangThaiThich']);

//Món ăn
Route::get('/ds-anh-mon/{id}',[MonAnController::class,'layDsHinhAnhMon']);

//Quán ăn
Route::get('/ds-anh-quan/{id}',[QuanAnController::class,'layDsHinhAnhQuan']);
Route::get('/ds-mon-an-quan/{id}',[QuanAnController::class,'layDsMonAn']);

//Nhà trọ
Route::get('/ds-anh-nha-tro/{id}',[NhaTroController::class,'layDsHinhAnhNhaTro']);

//Bài viết
Route::get('ds-bai-viet',[BaiVietController::class,'layTatCaBaiViet']);
Route::get('ds-bai-viet-noi-bat',[BaiVietController::class,'layBaiVietNoiBat']);
Route::get('viet-bai/{userid}/{ddId}/{tieude}/{noidung}',[BaiVietController::class,'vietBai']);
Route::get('/thong-tin-nguoi-dung/{id}',[BaiVietController::class,'layThongTinNguoiViet']);
Route::get('/dia-danh/{id}',[BaiVietController::class,'layTTinDiaDanh']);
Route::get('/ds-anh-bai-viet/{id}',[BaiVietController::class,'layDsAnhBaiViet']);
Route::get('like-bai-viet/{id}/{userid}',[BaiVietController::class,'likeBaiViet']);
Route::get('unlike-bai-viet/{id}/{userid}',[BaiVietController::class,'unlikeBaiViet']);
Route::get('dislike/{id}/{userid}',[BaiVietController::class,'dislike']);
Route::get('undislike/{id}/{userid}',[BaiVietController::class,'undislike']);
Route::get('trang-thai-thich-bai-viet/{id}/{userid}',[BaiVietController::class,'layTrangThaiThichBaiViet']);
Route::get('trang-thai-khong-thich-bai-viet/{id}/{userid}',[BaiVietController::class,'layTrangThaiKhongThichBaiViet']);

//Miền
Route::get('/ds-mien',[MienController::class,'layDsMien']);
Route::get('/ds-dia-danh-mien/{id}',[DiaDanhController::class,'layDsDiaDanhTheoMien']);

//Vùng
Route::get('ds-vung',[VungController::class,'layDsVung']);
Route::get('/ds-dia-danh-vung/{id}',[DiaDanhController::class,'layDsDiaDanhTheoVung']);

//Hoạt động
Route::get('/ds-hoat-dong',[HoatDongController::class,'layDsHoatDong']);
Route::get('/ds-dia-danh-hoat-dong/{id}',[HoatDongController::class,'layDsDiaDanh']);


Route::get('/logout',[NguoiDungController::class,'dangXuat']);


