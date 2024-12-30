<?php
class doimatkhau_m extends connectDB {
    function updmatkhau($username, $password, $newPassword) {
        // Kiểm tra thông tin đăng nhập trong csdl
        $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
        $result = $this->con->query($sql);

        if ($result->num_rows > 0) {
            // Tìm người dùng trong csdl, cập nhật mkhau ms 
            $updateSql = "UPDATE admins SET password = '$newPassword' WHERE username = '$username'";
            if ($this->con->query($updateSql) === TRUE) {
                return true;
            } else {
                echo "Lỗi cập nhật mật khẩu: " . $this->con->error;
                return false;
            }
        } else {
            return false; // Trả về false nếu không tìm thấy người dùng trong csdl
        }
    }
}
?>