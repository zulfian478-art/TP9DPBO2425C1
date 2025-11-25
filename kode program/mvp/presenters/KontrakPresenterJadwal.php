<?php
interface KontrakPresenterJadwal {
    public function tampilkanJadwal(): string;
    public function tampilkanFormJadwal($id = null): string;

    // CRUD
    public function tambahJadwal($seri, $tanggal, $lokasi, $jenis, $jumlah_lap = null, $durasi_menit = null): void;
    public function ubahJadwal($id, $seri, $tanggal, $lokasi, $jenis, $jumlah_lap = null, $durasi_menit = null): void;
    public function hapusJadwal($id): void;
}
?>
