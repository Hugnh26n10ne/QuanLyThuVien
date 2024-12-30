<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đổi mật khẩu</title>
    <style>
        input[type="text"],
        input[type="password"] {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 5px;
        margin-bottom: 10px;
        width: 200px;
        display: inline-block; 
    }

        input[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 6px 8px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #2b74c2;
    }
    </style>
</head>
<body>
    <h2 style="margin-bottom: 24px;text-align: center;font-weight: 500;">Đổi mật khẩu</h2>
    <form method="POST" action="http://localhost/quanlythuvien/doimatkhau_c/doimatkhau">
        <label for="username">Tên đăng nhập:</label>
        <input style="margin-bottom: 12px;width: 780px" type="text" id="username" name="username" required><br>

        <label for="password">Mật khẩu cũ:</label>
        <input style="margin-left: 17px;margin-bottom: 12px;width: 780px" type="password" id="password" name="password" required><br>

        <label for="new_password">Mật khẩu mới:</label>
        <input style="margin-left: 6px;width: 780px" type="password" id="new_password" name="new_password" required><br>

        <input style="margin-top: 7px;" type="submit" value="Đổi mật khẩu">
    </form>
</body>
</html>