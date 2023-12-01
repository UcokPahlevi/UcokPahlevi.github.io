<?php
session_start();
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $hapusQuery = "DELETE FROM data_siswa WHERE nis = $id";
    if ($koneksi->query($hapusQuery) === TRUE) {
        $_SESSION['alert_hapus'] = "";
        header("Location: /kelas/page/admin/data-kelas/data-siswa.php");
    } else {
        echo "Error : Gagal menghapus!";
    }
}
?>