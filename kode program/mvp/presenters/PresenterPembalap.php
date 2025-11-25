<?php
require_once(__DIR__ . "/KontrakPresenter.php");

class PresenterPembalap implements KontrakPresenter {

    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function tampilkanPembalap(): string {
        $list = $this->model->getAllPembalap();
        return $this->view->tampilPembalap($list);
    }

    public function tampilkanFormPembalap($id = null): string {
        $data = null;
        if ($id) {
            $row = $this->model->getPembalapById($id);
            if ($row) {
                $data = [
                    'id' => $row['id'],
                    'nama' => $row['nama'],
                    'tim' => $row['tim'],
                    'negara' => $row['negara'],
                    'poinMusim' => $row['poinMusim'],
                    'jumlahMenang' => $row['jumlahMenang']
                ];
            }
        }
        return $this->view->tampilFormPembalap($data);
    }

    public function tambahPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang): void {
        $this->model->addPembalap($nama, $tim, $negara, $poinMusim, $jumlahMenang);
    }

    public function ubahPembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang): void {
        $this->model->updatePembalap($id, $nama, $tim, $negara, $poinMusim, $jumlahMenang);
    }

    public function hapusPembalap($id): void {
        $this->model->deletePembalap($id);
    }
}
?>
