<?php
require_once "DB.php";
require_once "Jadwal.php";
require_once "KontrakModelJadwal.php";

class TabelJadwal implements KontrakModelJadwal {
    private $db;

    public function __construct($host, $db_name, $username, $password) {
        $this->db = new DB($host, $db_name, $username, $password);
    }

    public function getAllJadwal(): array {
        $stmt = $this->db->executeQuery("SELECT * FROM jadwal");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $list = [];
        foreach ($rows as $row) {
            $list[] = new Jadwal(
                $row['id'],
                $row['seri'],
                $row['tanggal'],
                $row['lokasi'],
                $row['jenis_lomba'],
                $row['jumlah_lap'] ?? null,
                $row['durasi_menit'] ?? null
            );
        }
        return $list;
    }

    public function getJadwalById($id): ?array {
        $stmt = $this->db->executeQuery("SELECT * FROM jadwal WHERE id=?", [$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;

        return [
            'id' => $row['id'],
            'seri' => $row['seri'],
            'tanggal' => $row['tanggal'],
            'lokasi' => $row['lokasi'],
            'jenis_lomba' => $row['jenis_lomba'],
            'jumlah_lap' => $row['jumlah_lap'] ?? null,
            'durasi_menit' => $row['durasi_menit'] ?? null
        ];
    }

    public function addJadwal($seri, $tanggal, $lokasi, $jenis_lomba, $jumlah_lap = null, $durasi_menit = null): void {
        $this->db->executeQuery(
            "INSERT INTO jadwal (seri, tanggal, lokasi, jenis_lomba, jumlah_lap, durasi_menit) VALUES (?, ?, ?, ?, ?, ?)",
            [$seri, $tanggal, $lokasi, $jenis_lomba, $jumlah_lap, $durasi_menit]
        );
    }

    public function updateJadwal($id, $seri, $tanggal, $lokasi, $jenis_lomba, $jumlah_lap = null, $durasi_menit = null): void {
        $this->db->executeQuery(
            "UPDATE jadwal SET seri=?, tanggal=?, lokasi=?, jenis_lomba=?, jumlah_lap=?, durasi_menit=? WHERE id=?",
            [$seri, $tanggal, $lokasi, $jenis_lomba, $jumlah_lap, $durasi_menit, $id]
        );
    }

    public function deleteJadwal($id): void {
        $this->db->executeQuery("DELETE FROM jadwal WHERE id=?", [$id]);
    }
}
?>
