<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Danh sách địa danh</title>
</head>
<body>
    
    <div class="ml-3 mr-3 mt-5 mb-5 ">   
        <h2 class="text-center">Danh sách các địa danh</h2>     
        <div class="top-content d-flex">
            <a href="{{ route('form-them-dia-danh') }}" class="btn btn-success mb-3 mr-2"> Thêm địa danh</a>  
            <a href="{{ route('ds-dia-danh-cho-duyet') }}" class="btn btn-success mb-3"> Danh sách chờ </a>  
        </div>
        <table class="table table-hover table-bordered text-center">
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
                        <td class="d-flex-col" >
                            <a href="{{ route('form-them-anh',['id' => $diaDanh->id ]) }}" class="btn btn-warning mb-2">Thêm hình ảnh</a>
                            <a href="{{ route('form-chinh-sua-dia-danh',['id' => $diaDanh->id ]) }}" class="btn btn-warning mr-2">Sửa</a>
                            <a href="{{ route('xoa-dia-danh',['id' => $diaDanh->id]) }}"  onClick="return confirm('Bạn có chắc muốn xoá địa danh này?')" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>