<?php
// Aktifkan error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// --- INCLUDE SEMUA CLASS ---
include_once("models/DB.php");

// Pembalap
include_once("models/TabelPembalap.php");
include_once("views/ViewPembalap.php");
include_once("presenters/PresenterPembalap.php");

// Jadwal
include_once("models/TabelJadwal.php");
include_once("views/ViewJadwal.php");
include_once("presenters/PresenterJadwal.php");

// --- INSTANTIATE ---
$tabelPembalap = new TabelPembalap('localhost', 'mvp_db', 'root', '');
$viewPembalap = new ViewPembalap();
$presenterPembalap = new PresenterPembalap($tabelPembalap, $viewPembalap);

$tabelJadwal = new TabelJadwal('localhost', 'mvp_db', 'root', '');
$viewJadwal = new ViewJadwal();
$presenterJadwal = new PresenterJadwal($tabelJadwal, $viewJadwal);

// --- ROUTING MENU ---
$menu = $_REQUEST['menu'] ?? 'pembalap';
$screen = $_GET['screen'] ?? '';

// --- HANDLE POST ACTIONS ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($menu === 'pembalap') {
        if ($action === 'add') {
            $presenterPembalap->tambahPembalap(
                $_POST['nama'] ?? '',
                $_POST['tim'] ?? '',
                $_POST['negara'] ?? '',
                $_POST['poinMusim'] ?? 0,
                $_POST['jumlahMenang'] ?? 0
            );
            header("Location: index.php?menu=pembalap");
            exit();
        } elseif ($action === 'edit') {
            $presenterPembalap->ubahPembalap(
                $_POST['id'],
                $_POST['nama'] ?? '',
                $_POST['tim'] ?? '',
                $_POST['negara'] ?? '',
                $_POST['poinMusim'] ?? 0,
                $_POST['jumlahMenang'] ?? 0
            );
            header("Location: index.php?menu=pembalap");
            exit();
        } elseif ($action === 'delete') {
            $presenterPembalap->hapusPembalap($_POST['id']);
            header("Location: index.php?menu=pembalap");
            exit();
        }
    } elseif ($menu === 'jadwal') {
        if ($action === 'add') {
            $presenterJadwal->tambahJadwal(
                $_POST['seri'] ?? '',
                $_POST['tanggal'] ?? '',
                $_POST['lokasi'] ?? '',
                $_POST['jenis'] ?? '',
                $_POST['jumlah_lap'] ?? null,
                $_POST['durasi_menit'] ?? null
            );
            header("Location: index.php?menu=jadwal");
            exit();
        } elseif ($action === 'edit') {
            $presenterJadwal->ubahJadwal(
                $_POST['id'],
                $_POST['seri'] ?? '',
                $_POST['tanggal'] ?? '',
                $_POST['lokasi'] ?? '',
                $_POST['jenis'] ?? '',
                $_POST['jumlah_lap'] ?? null,
                $_POST['durasi_menit'] ?? null
            );
            header("Location: index.php?menu=jadwal");
            exit();
        } elseif ($action === 'delete') {
            $presenterJadwal->hapusJadwal($_POST['id']);
            header("Location: index.php?menu=jadwal");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>MVP Balapan</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        nav a { margin-right: 10px; text-decoration: none; color: #333; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 4px 8px; text-decoration: none; border-radius: 3px; }
        .btn-edit { background-color: #4CAF50; color: white; }
        .btn-delete { background-color: #f44336; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav>
    <a href="index.php?menu=pembalap">Daftar Pembalap</a>
    <a href="index.php?menu=jadwal">Daftar Jadwal</a>
</nav>

<?php
// --- RENDER MENU ---
if ($menu === 'pembalap') {
    if ($screen === 'add') {
        echo $presenterPembalap->tampilkanFormPembalap();
    } elseif ($screen === 'edit' && isset($_GET['id'])) {
        echo $presenterPembalap->tampilkanFormPembalap($_GET['id']);
    } else {
        echo $presenterPembalap->tampilkanPembalap();
    }
} elseif ($menu === 'jadwal') {
    if ($screen === 'add') {
        echo $presenterJadwal->tampilkanFormJadwal();
    } elseif ($screen === 'edit' && isset($_GET['id'])) {
        echo $presenterJadwal->tampilkanFormJadwal($_GET['id']);
    } else {
        echo $presenterJadwal->tampilkanJadwal();
    }
}
?>

</body>
</html>
