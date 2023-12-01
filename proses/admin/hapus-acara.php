<?php
session_start();
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Hapus data berdasarkan ID
    $hapusQuery = "DELETE FROM acara WHERE id = $id";
    if ($koneksi->query($hapusQuery) === TRUE) {
    $_SESSION['alert-hapus-acara'] = "";
        header("Location: /kelas/page/admin/#notip-acara");
    } else {
        echo "Error : Gagal menghapus!";
    }
}
?>