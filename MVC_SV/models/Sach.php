<?php
require_once dirname(__DIR__) . '/db.php';


class Sach {
    private $conn;
    private $table_name = "ttinsach";

    public $tensach;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function searchBook($search) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE tensach LIKE :search";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":search", $search);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
