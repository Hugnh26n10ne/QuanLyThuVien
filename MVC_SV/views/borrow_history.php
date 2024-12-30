<?php
require_once dirname(__DIR__) . '/db.php';

session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    $database = new Database();
    $db = $database->getConnection();

    // Truy vấn mauser từ bảng sinhvien dựa trên username
    $query = "SELECT mauser FROM sinhvien WHERE masinhvien = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    echo "<div class='box'>";
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $mauser = $row['mauser'];

        // Truy vấn lịch sử mượn sách dựa trên mauser
        $query = "SELECT masach, ngaymuon, ngayphaitra, ngaytra FROM muontrasach WHERE mauser = :mauser";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":mauser", $mauser);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<table class='table'>";
            echo "<tr><th>Mã Sách</th><th>Ngày Mượn</th><th>Ngày Phải Trả</th><th>Ngày Trả</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['masach'] . "</td>";
                echo "<td>" . $row['ngaymuon'] . "</td>";
                echo "<td>" . $row['ngayphaitra'] . "</td>";
                echo "<td>" . $row['ngaytra'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Không có lịch sử mượn sách.</p>";
        }
    } else {
        echo "<p>Không tìm thấy thông tin người dùng.</p>";
    }
    echo "</div>";
} else {
    echo "<p>Vui lòng đăng nhập để xem lịch sử mượn sách.</p>";
}
?>
