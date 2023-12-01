<?php
session_start();
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $hapusQuery = "DELETE FROM jadwal_pelajaran WHERE id = $id";
    if ($koneksi->query($hapusQuery) === TRUE) {
        $_SESSION['alert_hapus'] = "";
        header("Location: /kelas/page/admin/data-kelas/jadwal-pelajaran.php");
    } else {
        echo "Error : Gagal menghapus!";
    }
}
?>