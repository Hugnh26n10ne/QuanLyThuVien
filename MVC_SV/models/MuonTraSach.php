<?php
require_once dirname(__DIR__) . '/db.php';


class MuonTraSach {
    private $conn;
    private $table_name = "muontrasach";

    public $mauser;
    public $tensach;
    public $ngaymuon;

    public function __construct() {
        $database = new Database();
    }

    public function getBorrowHistory($mauser) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE mauser = :mauser";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":mauser", $mauser);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
