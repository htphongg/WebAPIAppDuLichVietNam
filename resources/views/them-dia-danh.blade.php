<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Thêm địa danh</title>
</head>
<body>
    <div class="m-5">
        <h2>Thêm địa danh</h2>
        <form action="{{ route('xl-them-dia-danh') }}" class="was-validated" method="post">
            @csrf
        <div class="form-group">
            <label for="tendiadanh">Tên địa danh:</label>
            <input type="text" class="form-control" placeholder="Nhập vào tên địa danh" name="tendiadanh" required>
            <div class="valid-feedback">Hợp lệ.</div>
            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
        </div>
        <div class="form-group">
            <label for="avt">Ảnh đại diện:</label>
            <input type="text" class="form-control" placeholder="Nhập vào URL của ảnh" name="avt" required>
            <div class="valid-feedback">Hợp lệ.</div>
            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
        </div>
        <div class="form-group">
            <label for="mota">Mô tả:</label>
            <input type="text" class="form-control" placeholder="Nhập vào mô tả" name="mota" required>
            <div class="valid-feedback">Hợp lệ.</div>
            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
        </div>
        <div class="form-group">
            <label for="mien">Miền:</label>
            <select name="mien">
                @foreach($dsMien as $mien)
                    <option value="{{ $mien->id }}">{{ $mien->ten }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="vung">Vùng:</label>
            <select name="vung">
                @foreach($dsVung as $vung)
                    <option value="{{ $vung->id }}">{{ $vung->ten }}</option>
                @endforeach
            </select>
        </div>
        <label>Toạ độ:</label>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nhập vào kinh độ" name="kinhdo" required>
            <div class="valid-feedback">Hợp lệ.</div>
            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nhập vào vĩ độ" name="vido" required>
            <div class="valid-feedback">Hợp lệ.</div>
            <div class="invalid-feedback">Vui lòng điền vào trường này.</div>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>
</html>