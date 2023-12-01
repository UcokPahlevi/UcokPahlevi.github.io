<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST["nama"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $daftarQuery = "INSERT INTO akun_user (nama, tanggal_lahir, nomor_telepon, email, username, password) 
    VALUES ('$nama', '$tanggal_lahir', '$nomor_telepon', '$email', '$username', '$password')";
}

if ($koneksi->query($daftarQuery) === TRUE) {
    header("Location: /kelas/");
} else {
    echo "Error : Akun gagal didaftarkan";
}

?>