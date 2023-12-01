<?php
session_start();
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Hapus data berdasarkan ID
    $hapusQuery = "DELETE FROM pilih_carousel WHERE id = $id";
    if ($koneksi->query($hapusQuery) === TRUE) {
    $_SESSION['alert-hapus-carousel'] = "";
        header("Location: /kelas/page/admin/#notip-upload-carousel2");
    } else {
        echo "Error : Gagal menghapus!";
    }
}
?>