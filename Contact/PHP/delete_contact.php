<?php
// Lấy ID liên hệ từ URL
$id = $_GET['id'];

// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'username', 'password', 'database_name');
if (!$conn) {
    die('Không thể kết nối đến cơ sở dữ liệu: ' . mysqli_connect_error());
}

// Xóa liên hệ khỏi cơ sở dữ liệu
$query = "DELETE FROM danh_ba WHERE ID='$id'";
if (mysqli_query($conn, $query)) {
    echo 'Xóa liên hệ thành công.';
} else {
    echo 'Xóa liên hệ thất bại: ' . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);
?>