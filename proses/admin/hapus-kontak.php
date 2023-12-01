<?php
session_start();
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Hapus data berdasarkan ID
    $hapusQuery = "DELETE FROM kontak WHERE id_kontak = $id";
    if ($koneksi->query($hapusQuery) === TRUE) {
        $_SESSION['alert_hapus'] = "";
        header("Location: /kelas/page/admin/kontak.php");
    } else {
        echo "Error : Gagal menghapus!";
    }
}
?>