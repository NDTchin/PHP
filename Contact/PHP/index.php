<!DOCTYPE html>
<html>
<head>
    <title>Quản lý danh bạ</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Danh bạ điện thoại</h1>

<?php
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect('localhost', 'chin', '123456789', 'database_name');
if (!$conn) {
    die('Không thể kết nối đến cơ sở dữ liệu: ' . mysqli_connect_error());
}

// Lấy danh sách liên hệ từ cơ sở dữ liệu
$query = "SELECT * FROM contacts";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<table>';
    echo '<tr><th>ID</th><th>Tên</th><th>Số điện thoại</th><th></th></tr>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['ID'] . '</td>';
        echo '<td>' . $row['Ten'] . '</td>';
        echo '<td>' . $row['SoDienThoai'] . '</td>';
        echo '<td><a href="edit_contact.php?id=' . $row['ID'] . '">Chỉnh sửa</a> | <a href="delete_contact.php?id=' . $row['ID'] . '">Xóa</a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'Không có liên hệ nào.';
}

// Đóng kết nối
mysqli_close($conn);
?>

<br>
<a href="add_contact.php">Thêm liên hệ mới</a>
</body>
</html>