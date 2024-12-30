<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn Vai Trò</title>
    <link rel="stylesheet" type="text/css" href="mt.css">
</head>
<body>
    <div class="container">
        <h1>Chọn Vai Trò</h1>
        <form method="POST" action="huongdan.php">
            <div class="radio-group">
                <label class="radio">
                    <input type="radio" name="role" value="student">
                    Sinh viên
                </label>
                <label class="radio">
                    <input type="radio" name="role" value="admin">
                    Admin
                </label>
            </div>
            <button type="submit">Xác nhận</button>
        </form>
    </div>
</body>
</html>