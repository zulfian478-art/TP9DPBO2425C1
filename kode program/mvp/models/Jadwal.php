<?php
class Jadwal {
    private $id;
    private $seri;
    private $tanggal;
    private $lokasi;
    private $jenis;
    private $jumlah_lap;
    private $durasi_menit;

    public function __construct($id, $seri, $tanggal, $lokasi, $jenis, $jumlah_lap = null, $durasi_menit = null) {
        $this->id = $id;
        $this->seri = $seri;
        $this->tanggal = $tanggal;
        $this->lokasi = $lokasi;
        $this->jenis = $jenis;
        $this->jumlah_lap = $jumlah_lap;
        $this->durasi_menit = $durasi_menit;
    }

    public function getId(){ return $this->id; }
    public function getSeri(){ return $this->seri; }
    public function getTanggal(){ return $this->tanggal; }
    public function getLokasi(){ return $this->lokasi; }
    public function getJenis(){ return $this->jenis; }
    public function getJumlahLap(){ return $this->jumlah_lap; }
    public function getDurasiMenit(){ return $this->durasi_menit; }
}
?>
