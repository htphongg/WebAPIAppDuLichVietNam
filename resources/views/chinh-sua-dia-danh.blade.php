<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../asset/css/chinh-sua-dia-danh.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Chỉnh sửa địa danh</title>
</head>
<body>
    <div class="container">
        <h2>Chỉnh sửa thông tin địa danh</h2>
        <div class="lst-btn mb-3">
            <button type="submit" class="btn btn-primary">Thêm món ăn</button>
            <button type="submit" class="btn btn-primary">Thêm quán ăn</button>
            <button type="submit" class="btn btn-primary">Thêm nhà trọ</button>
        </div>
        <form action="{{ route('xl-chinh-sua-dia-danh',['id' => $diaDanh->id]) }}" class="was-validated" method="post">
            @csrf
        <div class="form-group">
            <label for="tendiadanh">Tên địa danh:</label>
            <input type="text" class="form-control" placeholder="Nhập vào tên địa danh" name="tendiadanh" value="{{ $diaDanh->ten }}" required>
            <div class="valid-feedback">Hợp lệ.</div>
            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
        </div>
        <div class="form-group">
            <label for="avt">Ảnh đại diện:</label>
            <input type="text" class="form-control" placeholder="Nhập vào URL của ảnh" name="avt" value="{{ $diaDanh->avt }}" required>
            <div class="valid-feedback">Hợp lệ.</div>
            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
        </div>
        <div class="form-group">
            <label for="mota">Mô tả:</label>
            <input type="text" class="form-control" placeholder="Nhập vào mô tả" name="mota" value="{{ $diaDanh->mo_ta }}" required>
            <div class="valid-feedback">Hợp lệ.</div>
            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
        </div>
        <div class="form-group">
            <label for="mien">Miền:</label>
            <select name="mien">
                @foreach($dsMien as $mien)
                    @if($mien->id == $diaDanh->mien_id)
                        <option selected="selected"  value="{{ $mien->id }}">{{ $mien->ten }}</option>
                    @else
                        <option value="{{ $mien->id }}">{{ $mien->ten }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vung">Vùng:</label>
            <select name="vung">
                @foreach($dsVung as $vung)
                    @if($vung->id == $diaDanh->vung_id)
                        <option selected="selected"  value="{{ $vung->id }}">{{ $vung->ten }}</option>
                    @else
                        <option value="{{ $vung->id }}">{{ $vung->ten }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <label>Toạ độ:</label>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nhập vào kinh độ" name="kinhdo" value="{{ $diaDanh->kinh_do }}" required>
            <div class="valid-feedback">Hợp lệ.</div>
            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nhập vào vĩ độ" name="vido" value="{{ $diaDanh->vi_do }}" required>
            <div class="valid-feedback">Hợp lệ.</div>
            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
        </div>
            <button type="submit" class="btn btn-primary ">Cập nhật</button>
        </form>
    </div>
</body>
</html>