<?php
session_start();
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];

    $openHouseQuery = "INSERT INTO open_house (nama, kelas) VALUES ('$nama','$kelas')";
}

if ($koneksi->query($openHouseQuery) === TRUE) {
    $_SESSION['alert-berhasil'] = "";
    header("Location: /kelas/page/user/acara/open-house.php");
} else {
    echo "ERROR";
}

?>