<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Đăng nhập</h1>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng nhập</button>
        </form>
        <?php
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require 'controllers/LoginController.php';
            $loginController = new LoginController();
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($loginController->authenticate($username, $password)) {
                $_SESSION['username'] = $username;
                header("Location: views/home.php");
                exit();
            } else {
                echo "<p class='error'>Sai tên đăng nhập hoặc mật khẩu!</p>";
            }
        }
        ?>
    </div>
</body>
</html>
