<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <script>
        function confirmLogout(event) {
            if (!confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <div class="navbar">
        <div class="navbar-left">
            <a href="home.php">
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
            <div class="dropdown">
                <button>
                    <img src="https://png.pngtree.com/png-vector/20190223/ourlarge/pngtree-student-glyph-black-icon-png-image_691145.jpg" alt="User Menu">
                </button>
                <div class="dropdown-content">
                    <a href="?action=student_info">Thông tin sinh viên</a>
                    <a href="?action=borrow_history">Lịch sử mượn sách</a>
                    <a href="../controllers/LogoutController.php" class="logout" onclick="confirmLogout(event)">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <?php
        require_once dirname(__DIR__) . '/db.php';

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