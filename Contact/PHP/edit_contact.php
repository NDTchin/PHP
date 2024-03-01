<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa liên hệ</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Chỉnh sửa liên hệ</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ biểu mẫu
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $soDienThoai = $_POST['so_dien_thoai'];

    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect('localhost', 'username', 'password', 'database_name');
    if (!$conn) {
        die('Không thể kết nối đến cơ sở dữ liệu: ' . mysqli_connect_error());
    }

    // Cập nhật thông tin liên hệ vào cơ sở dữ liệu
    $query = "UPDATE danh_ba SET Ten='$ten', SoDienThoai='$soDienThoai' WHERE ID='$id'";
    if (mysqli_query($conn, $query)) {
        echo 'Cập nhật liên hệ thành công.';
    } else {
        echo 'Cập nhật liên hệ thất bại: ' . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
} else {
    // Lấy ID liên hệ từ URL
    $id = $_GET['id'];

    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect('localhost', 'username', 'password', 'database_name');
    if (!$conn) {
        die('Không thể kết nối đến cơ sở dữ liệu: ' . mysqli_connect_error());
    }

    // Lấy thông tin liên hệ từ cơ sở dữ liệu
    $query = "SELECT * FROM danh_ba WHERE ID='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Đóng kết nối
    mysqli_close($conn);
}
?>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

    <label for="ten">Tên:</label>
    <input type="text" name="ten" value="<?php echo $row['Ten']; ?>" required><br><br>

    <label for="so_dien_thoai">Số điện thoại:</label>
    <input type="text" name="so_dien_thoai" value="<?php echo $row['SoDienThoai']; ?>" required><br><br>

    <input type="submit" value="Lưu">
</form>
</body>
</html>