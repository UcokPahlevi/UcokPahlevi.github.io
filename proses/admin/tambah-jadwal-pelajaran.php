<?php
session_start();
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hari = $_POST['hari'];
    $jam_1 = $_POST['jam_1'];
    $jam_2 = $_POST['jam_2'];
    $jam_3 = $_POST['jam_3'];
    $jam_4 = $_POST['jam_4'];
    $istirahat_1 = $_POST['istirahat_1'];
    $jam_5 = $_POST['jam_5'];
    $jam_6 = $_POST['jam_6'];
    $jam_7 = $_POST['jam_7'];
    $istirahat_2 = $_POST['istirahat_2'];
    $jam_8 = $_POST['jam_8'];
    $jam_9 = $_POST['jam_9'];
    $jam_10 = $_POST['jam_10'];
    $jam_11 = $_POST['jam_11'];
    $jam_12 = $_POST['jam_12'];

    $sql = "INSERT INTO jadwal_pelajaran (hari, jam_1, jam_2, jam_3, jam_4, istirahat_1, jam_5,
            jam_6, jam_7, istirahat_2, jam_8, jam_9, jam_10, jam_11, jam_12)
            VALUES ('$hari', '$jam_1', '$jam_2', '$jam_3', '$jam_4', '$istirahat_1', '$jam_5', '$jam_6',
            '$jam_7', '$istirahat_2', '$jam_8', '$jam_9', '$jam_10', '$jam_11', '$jam_12')";
}

if ($koneksi->query($sql) === TRUE) {
    $_SESSION['alert_tambah'] = "";
    header("Location: /kelas/page/admin/data-kelas/jadwal-pelajaran.php");
} else {
    echo "Error : Pesan tidak terkirim";
}
?>