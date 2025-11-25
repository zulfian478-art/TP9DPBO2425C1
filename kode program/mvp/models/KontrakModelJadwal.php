<?php
interface KontrakModelJadwal {
    public function getAllJadwal(): array;
    public function getJadwalById($id): ?array;

    public function addJadwal($seri, $tanggal, $lokasi, $jenis, $jumlah_lap = null, $durasi_menit = null): void;
    public function updateJadwal($id, $seri, $tanggal, $lokasi, $jenis, $jumlah_lap = null, $durasi_menit = null): void;
    public function deleteJadwal($id): void;
}
?>
