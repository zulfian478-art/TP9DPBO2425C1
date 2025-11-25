<?php
require_once "DB.php";
require_once "Pembalap.php";
require_once "KontrakModel.php";

class TabelPembalap implements KontrakModel {
    private $db;

    public function __construct($host, $db_name, $username, $password) {
        $this->db = new DB($host, $db_name, $username, $password);
    }

    public function getAllPembalap(): array {
        $stmt = $this->db->executeQuery("SELECT * FROM pembalap");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $list = [];
        foreach ($rows as $row) {
            $list[] = new Pembalap(
                $row['id'],
                $row['nama'],
                $row['tim'],
                $row['negara'],
                $row['poinMusim'] ?? 0,
                $row['jumlahMenang'] ?? 0
            );
        }
        return $list;
    }

    public function getPembalapById($id): ?array {
        $stmt = $this->db->executeQuery("SELECT * FROM pembalap WHERE id = ?", [$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;

        return [
            'id' => $row['id'],
            'nama' => $row['nama'],
            'tim' => $row['tim'],
            'negara' => $row['negara'],
            'poinMusim' => $row['poinMusim'] ?? 0,
            'jumlahMenang' => $row['jumlahMenang'] ?? 0
        ];
    }

    public function addPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang): void {
        $this->db->executeQuery(
            "INSERT INTO pembalap (nama, tim, negara, poinMusim, jumlahMenang) VALUES (?, ?, ?, ?, ?)",
            [$nama, $tim, $negara, $poinMusim, $jumlahMenang]
        );
    }

    public function updatePembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang): void {
        $this->db->executeQuery(
            "UPDATE pembalap SET nama=?, tim=?, negara=?, poinMusim=?, jumlahMenang=? WHERE id=?",
            [$nama, $tim, $negara, $poinMusim, $jumlahMenang, $id]
        );
    }

    public function deletePembalap($id): void {
        $this->db->executeQuery("DELETE FROM pembalap WHERE id=?", [$id]);
    }
}
?>
