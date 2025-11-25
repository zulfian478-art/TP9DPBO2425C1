<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=mvp_db", "root", "");
    echo "Koneksi berhasil!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
