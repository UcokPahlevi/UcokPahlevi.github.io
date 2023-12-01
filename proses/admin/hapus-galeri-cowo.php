<?php
session_start();
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Hapus data berdasarkan ID
    $hapusQuery = "DELETE FROM galeri WHERE id = $id";
    if ($koneksi->query($hapusQuery) === TRUE) {
        $_SESSION['alert_hapus'] = "";
        header("Location: /kelas/page/admin/galeri/galeri-cowo.php");
    } else {
        echo "Error : Gagal menghapus!";
    }
}
?>