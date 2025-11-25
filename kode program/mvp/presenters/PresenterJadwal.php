<?php
require_once(__DIR__ . "/KontrakPresenterJadwal.php");

class PresenterJadwal implements KontrakPresenterJadwal {

    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function tampilkanJadwal(): string {
        $list = $this->model->getAllJadwal();
        return $this->view->tampilJadwal($list);
    }

    public function tampilkanFormJadwal($id = null): string {
        $data = null;
        if ($id) {
            $row = $this->model->getJadwalById($id);
            if ($row) $data = $row;
        }
        return $this->view->tampilFormJadwal($data);
    }

    public function tambahJadwal($seri, $tanggal, $lokasi, $jenis, $jumlah_lap = null, $durasi_menit = null): void {
        $this->model->addJadwal($seri, $tanggal, $lokasi, $jenis, $jumlah_lap, $durasi_menit);
    }

    public function ubahJadwal($id, $seri, $tanggal, $lokasi, $jenis, $jumlah_lap = null, $durasi_menit = null): void {
        $this->model->updateJadwal($id, $seri, $tanggal, $lokasi, $jenis, $jumlah_lap, $durasi_menit);
    }

    public function hapusJadwal($id): void {
        $this->model->deleteJadwal($id);
    }
}
?>
