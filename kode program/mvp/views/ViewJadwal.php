<?php
require_once(__DIR__ . "/KontrakViewJadwal.php");

class ViewJadwal implements KontrakViewJadwal {

    public function tampilJadwal($listJadwal): string {
        $html = '<h2>Daftar Jadwal</h2>';
        $html .= '<a href="index.php?menu=jadwal&screen=add" class="btn btn-edit">Tambah Jadwal</a>';
        $html .= '<table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Seri</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Jenis</th>
                    <th>Jumlah Lap</th>
                    <th>Durasi (menit)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
        $no = 1;
        foreach ($listJadwal as $j) {
            $html .= '<tr>
                <td>'.$no++.'</td>
                <td>'.$j->getSeri().'</td>
                <td>'.$j->getTanggal().'</td>
                <td>'.$j->getLokasi().'</td>
                <td>'.$j->getJenis().'</td>
                <td>'.$j->getJumlahLap().'</td>
                <td>'.$j->getDurasiMenit().'</td>
                <td>
                    <a href="index.php?menu=jadwal&screen=edit&id='.$j->getId().'" class="btn btn-edit">Edit</a>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="'.$j->getId().'">
                        <button type="submit" class="btn btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>';
        }
        $html .= '</tbody></table>';
        return $html;
    }

    public function tampilFormJadwal($data = null): string {
        $action = $data ? 'edit' : 'add';
        $id = $data['id'] ?? '';
        $seri = $data['seri'] ?? '';
        $tanggal = $data['tanggal'] ?? '';
        $lokasi = $data['lokasi'] ?? '';
        $jenis = $data['jenis'] ?? '';
        $jumlah_lap = $data['jumlah_lap'] ?? '';
        $durasi_menit = $data['durasi_menit'] ?? '';

        return <<<HTML
        <h2>Form Jadwal</h2>
        <form method="post">
            <input type="hidden" name="action" value="$action">
            <input type="hidden" name="id" value="$id">
            <label>Seri</label>
            <input type="text" name="seri" value="$seri" required>
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="$tanggal" required>
            <label>Lokasi</label>
            <input type="text" name="lokasi" value="$lokasi" required>
            <label>Jenis</label>
            <input type="text" name="jenis" value="$jenis" required>
            <label>Jumlah Lap</label>
            <input type="number" name="jumlah_lap" value="$jumlah_lap">
            <label>Durasi (menit)</label>
            <input type="number" name="durasi_menit" value="$durasi_menit">
            <br><br>
            <button type="submit">Simpan</button>
        </form>
HTML;
    }
}
?>
