<?php
session_start();
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $queryAkun = "SELECT * FROM akun_admin WHERE username = '$username' AND password = '$password'";
    $resultAkun = $koneksi->query($queryAkun);

    if ($resultAkun->num_rows > 0) {
        $_SESSION["username"] = $username;
        header("Location: /kelas/page/admin/");
    } else {
            $_SESSION['error'] = "Username atau password salah.";
            header("Location: /kelas/masuk.php");
        }
}
?>