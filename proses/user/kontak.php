<?php
session_start();
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nama = $_POST["nama"];
    $kategori = $_POST["kategori"];
    $pesan = $_POST["pesan"];

    $kontakQuery = "INSERT INTO kontak (nama, kategori, pesan) VALUES ('$nama','$kategori','$pesan')";
}

if ($koneksi->query($kontakQuery) === TRUE) {
    $_SESSION['alert-berhasil'] = "";
    header("Location: /kelas/page/user/kontak.php");
} else {
    echo "ERROR";
}

?>