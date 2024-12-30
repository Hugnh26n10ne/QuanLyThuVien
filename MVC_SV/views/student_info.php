<?php
require_once dirname(__DIR__) . '/db.php';

session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $database = new Database();
    $db = $database->getConnection();

    $query = "SELECT masinhvien, tensinhvien, namsinh, gioitinh, sodienthoai FROM sinhvien WHERE masinhvien = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    echo "<div class='box'>";
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<table class='student-info'>";
        echo "<tr><th>Mã sinh viên</th><td>" . $row['masinhvien'] . "</td></tr>";
        echo "<tr><th>Tên sinh viên</th><td>" . $row['tensinhvien'] . "</td></tr>";
        echo "<tr><th>Năm sinh</th><td>" . $row['namsinh'] . "</td></tr>";
        echo "<tr><th>Giới tính</th><td>" . $row['gioitinh'] . "</td></tr>";
        echo "<tr><th>Số điện thoại</th><td>" . $row['sodienthoai'] . "</td></tr>";
        echo "</table>";
    } else {
        echo "<p>Không tìm thấy thông tin sinh viên.</p>";
    }
    echo "</div>";
}
?>
