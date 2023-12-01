<?php
session_start();
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hapusQuery = "DELETE FROM uang_kas WHERE id_kas = $id";
    if ($koneksi->query($hapusQuery) === TRUE) {
        $_SESSION['alert_hapus'] = "";
        header("Location: /kelas/page/admin/data-kelas/uang-kas.php");
    } else {
        echo "Error : Gagal menghapus data!";
    }
}
?>