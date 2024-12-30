<!DOCTYPE html>
<html>
<head>
    <title>Trang Master</title>
    <link rel="stylesheet" type="text/css" href="Lord.css">
</head>
<body>
    <div class="navbar">
        <div class="navbar-left">
            <a href="master.php">
                <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Home">
            </a>
        </div>
        <div class="navbar-center">
            <form method="GET" action="">
                <input type="text" name="search" placeholder="Tìm kiếm sách">
                <button type="submit">
                    <img src="https://png.pngtree.com/element_our/20190601/ourmid/pngtree-search-icon-image_1344447.jpg" alt="Tìm kiếm">
                </button>
            </form>
        </div>
        <div class="navbar-right">
            <button onclick="window.location.href='http://localhost/quanlythuvien/master.php?gidzl=kxRmU_It63EvhlXuzQmSCBAg_dhZfHPW_wFoBBYjHcVpgA4lklf5PAVqh2pifaiqygQgU6D_Dz5yzR4HCG'">Đăng nhập</button>
        </div>
    </div>

    <div class="container">
        <?php
        session_start();
        require_once __DIR__ . '/MVC_SV/db.php'; // Điều chỉnh đường dẫn tới tệp db.php

        $database = new Database();
        $db = $database->getConnection();

        // Hiển thị kết quả tìm kiếm nếu có
        if (isset($_GET['search'])) {
            $search_term = $_GET['search'];
            $query = "SELECT tensach, tacgia, namxb, theloai, tinhtrang FROM ttinsach WHERE tensach LIKE :search";
            $stmt = $db->prepare($query);
            $search_term = "%$search_term%";
            $stmt->bindParam(":search", $search_term);
            $stmt->execute();

            echo "<div class='box'>";
            if ($stmt->rowCount() > 0) {
                echo "<table class='table'>";
                echo "<tr><th>Tên Sách</th><th>Tác Giả</th><th>Năm XB</th><th>Thể Loại</th><th>Tình Trạng</th></tr>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>" . $row['tensach'] . "</td><td>" . $row['tacgia'] . "</td><td>" . $row['namxb'] . "</td><td>" . $row['theloai'] . "</td><td>" . $row['tinhtrang'] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Không tìm thấy kết quả.</p>";
            }
            echo "</div>";
        } elseif (isset($_GET['action']) && $_GET['action'] == 'student_info') {
            include 'student_info.php';
        } elseif (isset($_GET['action']) && $_GET['action'] == 'borrow_history') {
            include 'borrow_history.php';
        } else {
            // Hiển thị thông tin sách ngay khi đăng nhập
            $query = "SELECT tensach, tacgia, namxb, theloai, tinhtrang FROM ttinsach";
            $stmt = $db->prepare($query);
            $stmt->execute();

            echo "<div class='box'>";
            if ($stmt->rowCount() > 0) {
                echo "<table class='table'>";
                echo "<tr><th>Tên Sách</th><th>Tác Giả</th><th>Năm XB</th><th>Thể Loại</th><th>Tình Trạng</th></tr>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr><td>" . $row['tensach'] . "</td><td>" . $row['tacgia'] . "</td><td>" . $row['namxb'] . "</td><td>" . $row['theloai'] . "</td><td>" . $row['tinhtrang'] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Không có sách nào.</p>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>