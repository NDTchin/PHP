<!DOCTYPE html>
<html>
<head>
    <title>Thêm liên hệ mới</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Thêm liên hệ mới</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ biểu mẫu
    $ten = $_POST['ten'];
    $soDienThoai = $_POST['so_dien_thoai'];

    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect('localhost', 'username', 'password', 'database_name');
    if (!$conn) {
        die('Không thể kết nối đến cơ sở dữ liệu: ' . mysqli_connect_error());
    }

    // Thêm liên hệ mới vào cơ sở dữ liệu
    $query = "INSERT INTO danh_ba (Ten, SoDienThoai) VALUES ('$ten', '$soDienThoai')";
    if (mysqli_query($conn, $query)) {
        echo 'Thêm liên hệ thành công.';
    } else {
        echo 'Thêm liên hệ thất bại: ' . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>

<form method="POST" action="">
    <label for="ten">Tên:</label>
    <input type="text" name="ten" required><br><br>

    <label for="so_dien_thoai">Số điện thoại:</label>
    <input type="text" name="so_dien_thoai" required><br><br>

    <input type="submit" value="Thêm">
</form>
</body>
</html>