<?php
require_once dirname(__DIR__) . '/db.php';

class LoginController {
    public function authenticate($username, $password) {
        $database = new Database();
        $db = $database->getConnection();

        $query = "SELECT * FROM sinhvien WHERE masinhvien = :username AND matkhau = :password";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        if($stmt->rowCount() == 1) {
            return true;
        }
        return false;
    }
}
?>
