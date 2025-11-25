<?php
class DB {
    private $host = "localhost";
    private $db_name = "";
    private $username = "";
    private $password = "";
    private $conn;
    private $result;

    function __construct($host, $db_name, $username, $password) {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
        $this->conn = $this->connect();
    }

    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            return new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $exception) {
            throw new RuntimeException("Koneksi gagal: " . $exception->getMessage(), 0, $exception);
        }
    }

    public function executeQuery($query, $params = []) {
        if ($this->conn === null) throw new RuntimeException('No database connection.');
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        $this->result = $stmt;
        return $stmt;
    }

    public function getAllResult() {
        if ($this->result === null) return [];
        return $this->result->fetchAll(PDO::FETCH_ASSOC);
    }

    // --- Tambahan untuk kompatibilitas TabelPembalap ---
    public function query($sql, $params = []) {
        $stmt = $this->executeQuery($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute($sql, $params = []) {
        $this->executeQuery($sql, $params);
        return true;
    }

    public function lastInsertId() {
        return $this->conn->lastInsertId();
    }

    public function close() {
        $this->conn = null;
    }
}
?>
