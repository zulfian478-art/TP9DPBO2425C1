<?php
interface KontrakViewJadwal {
    public function tampilJadwal($listJadwal): string;
    public function tampilFormJadwal($data = null): string;
}
?>
