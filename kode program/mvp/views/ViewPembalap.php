<?php
require_once(__DIR__ . "/KontrakView.php"); // pastikan ini path-nya benar

class ViewPembalap implements KontrakView {

    public function tampilPembalap($listPembalap): string {
        $html = '<h2>Daftar Pembalap</h2>';
        $html .= '<a href="index.php?menu=pembalap&screen=add" class="btn btn-edit">Tambah Pembalap</a>';
        $html .= '<table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tim</th>
                    <th>Negara</th>
                    <th>Poin Musim</th>
                    <th>Jumlah Menang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';

        $no = 1;
        foreach($listPembalap as $p) {
            $html .= '<tr>
                <td>'.$no++.'</td>
                <td>'.$p->getNama().'</td>
                <td>'.$p->getTim().'</td>
                <td>'.$p->getNegara().'</td>
                <td>'.$p->getPoinMusim().'</td>
                <td>'.$p->getJumlahMenang().'</td>
                <td>
                    <a href="index.php?menu=pembalap&screen=edit&id='.$p->getId().'" class="btn btn-edit">Edit</a>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="'.$p->getId().'">
                        <button type="submit" class="btn btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>';
        }

        $html .= '</tbody></table>';
        return $html;
    }

    public function tampilFormPembalap($data = null): string {
        $action = $data ? 'edit' : 'add';
        $id = $data ? $data['id'] : '';
        $nama = $data ? $data['nama'] : '';
        $tim = $data ? $data['tim'] : '';
        $negara = $data ? $data['negara'] : '';
        $poin = $data ? $data['poinMusim'] : 0;
        $menang = $data ? $data['jumlahMenang'] : 0;

        return <<<HTML
        <h2>Form Pembalap</h2>
        <form method="post">
            <input type="hidden" name="action" value="$action">
            <input type="hidden" name="id" value="$id">
            <label>Nama</label>
            <input type="text" name="nama" value="$nama" required>
            <label>Tim</label>
            <input type="text" name="tim" value="$tim" required>
            <label>Negara</label>
            <input type="text" name="negara" value="$negara">
            <label>Poin Musim</label>
            <input type="number" name="poinMusim" value="$poin">
            <label>Jumlah Menang</label>
            <input type="number" name="jumlahMenang" value="$menang">
            <br><br>
            <button type="submit">Simpan</button>
        </form>
HTML;
    }
}
?>
