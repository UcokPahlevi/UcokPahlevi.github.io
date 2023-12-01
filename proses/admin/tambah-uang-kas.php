<?php
session_start();
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $m1 = "belum";
    $m2 = "belum";
    $m3 = "belum";
    $m4 = "belum";
    $bulan = $_POST['bulan'];

    $sql = "INSERT INTO uang_kas (nama, minggu_1, minggu_2, minggu_3, minggu_4, bulan)
             VALUES ('$nama', '$m1', '$m2', '$m3', '$m4', '$bulan')";
}

if ($koneksi->query($sql) === TRUE) {
    $_SESSION['alert_tambah'] = "";
    header("Location: /kelas/page/admin/data-kelas/uang-kas.php");
} else {
    echo "Error : Pesan tidak terkirim";
}
?>