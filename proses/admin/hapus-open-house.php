<?php
session_start();
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hapusQuery = "DELETE FROM open_house WHERE id = $id";
    if ($koneksi->query($hapusQuery) === TRUE) {
        $_SESSION['alert_hapus'] = "";
        header("Location: /kelas/page/admin/acara/open-house.php");
    } else {
        echo "Error : Gagal menghapus data!";
    }
}
?>