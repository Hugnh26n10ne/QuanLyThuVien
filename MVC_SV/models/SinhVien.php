<?php
require_once dirname(__DIR__) . '/db.php';


class SinhVien {
    private $conn;
    private $table_name = "sinhvien";

    public $masinhvien;
    public $hoten;
    public $ngaysinh;
    public $lop;
    public $matkhau;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function authenticate($username, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE masinhvien = :username AND matkhau = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();

        if($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->masinhvien = $row['masinhvien'];
            $this->hoten = $row['hoten'];
            $this->ngaysinh = $row['ngaysinh'];
            $this->lop = $row['lop'];
            $this->matkhau = $row['matkhau'];
            return true;
        }
        return false;
    }

    public function getSinhVienInfo() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE masinhvien = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->masinhvien);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
