<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../asset/css/chinh-sua-dia-danh.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Thêm ảnh</title>
</head>
<body>
    <div class="m-5">
        <h2>Thêm ảnh cho địa danh</h2>
        <form action="{{ route('xl-them-anh',['id' => $dia_danh_id]) }}" method="post">
            @csrf
        <div class="form-group">
            <label for="anh1">Ảnh 1:</label>
            <input type="text" class="form-control" placeholder="Nhập vào URL của ảnh" name="anh1">
        </div>
        <div class="form-group">
            <label for="anh2">Ảnh 2:</label>
            <input type="text" class="form-control" placeholder="Nhập vào URL của ảnh" name="anh2">
        </div>
        <div class="form-group">
            <label for="anh3">Ảnh 3:</label>
            <input type="text" class="form-control" placeholder="Nhập vào URL của ảnh" name="anh3">
        </div>
        <div class="form-group">
            <label for="anh4">Ảnh 4:</label>
            <input type="text" class="form-control" placeholder="Nhập vào URL của ảnh" name="anh4">
        </div>
        <div class="form-group">
            <label for="anh5">Ảnh 5:</label>
            <input type="text" class="form-control" placeholder="Nhập vào URL của ảnh" name="anh5">
        </div>
        <div class="form-group">
            <label for="anh6">Ảnh 6:</label>
            <input type="text" class="form-control" placeholder="Nhập vào URL của ảnh" name="anh6">
        </div>
        <button type="submit" class="btn btn-primary">Thêm hình ảnh</button>
        </form>
    </div>
</body>
</html>