<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Danh sách địa danh chờ</title>
</head>
<body>
    
    <div class="ml-3 mr-3 mt-5 mb-5 ">   
        <h2 class="text-center">Danh sách địa danh chờ xét duyệt</h2>     
        <a href="{{ route('xem-ds-dia-danh') }}" class="btn btn-info mb-3">Quay lại trang chủ</a>
        <table class="table table-hover  table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Tên địa danh</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Vùng</th>
                    <th>Miền</th>
                    <th>Lượt checkin</th>
                    <th>Số lượt thích</th>
                    <th>Toạ độ</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dsDiaDanh as $diaDanh)
                    <tr>
                        <td>{{ $diaDanh->ten }}</td>
                        <td><img src="{{ $diaDanh->avt }}" alt="Ảnh địa danh" class="w-100 h-100"></td>
                        <td>{{ $diaDanh->mo_ta }}</td>
                        <td>{{ $diaDanh->mien->ten }}</td>
                        <td>{{ $diaDanh->vung->ten }}</td>
                        <td>{{ $diaDanh->luot_checkin }}</td>
                        <td>{{ $diaDanh->luot_thich }}</td>
                        <td>({{ $diaDanh->kinh_do}} , {{ $diaDanh->vi_do}})</td>
                        <td class="d-flex" >
                            <a href="{{ route('chap-nhan-dia-danh',['id' => $diaDanh->id ]) }}" class="btn btn-warning mr-2">Chấp nhận</a>
                            <a href="{{ route('xoa-dia-danh',['id' => $diaDanh->id]) }}"  onClick="return confirm('Bạn có chắc muốn xoá địa danh này?')" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>