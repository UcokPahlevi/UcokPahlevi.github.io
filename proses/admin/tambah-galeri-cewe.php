<?php
session_start();
include '../../koneksi.php';
function upload()
{
    $namaGambar = $_FILES['gambar']['name'];
    $ukuranGambar = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        $_SESSION['error'] = "Pilih gambar terlebih dahulu!";
        header("Location: /kelas/page/admin/pengaturan/tambah-galeri-cewe.php");
        return false;
    }

    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $namaGambar);
    $ekstensi = strtolower(end($ekstensi));
    if (!in_array($ekstensi, $ekstensiValid)) {
        $_SESSION['error'] = "Hanya menerima file jpg, jpeg & png!";
        header("Location: /kelas/page/admin/pengaturan/tambah-galeri-cewe.php");
        return false;
    }

    if ($ukuranGambar > 2000000) {
        $_SESSION['error'] = "Ukuran gambar terlalu besar!";
        header("Location: /kelas/page/admin/pengaturan/tambah-galeri-cewe.php");
        return false;
    }

    $namaGambarBaru = uniqid();
    $namaGambarBaru .= '.';
    $namaGambarBaru .= $ekstensi;

    move_uploaded_file($tmpName, '../../assets/images/galeri/' . $namaGambarBaru);
    return $namaGambarBaru;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];

    $uploadQuery = "INSERT INTO galeri (url, keterangan, tanggal, kategori ) VALUES ('$gambar', '$keterangan', '$tanggal', '$kategori')";
}

if ($koneksi->query($uploadQuery) === TRUE) {
    $_SESSION['alert_tambah'] = "";
    header("Location: /kelas/page/admin/galeri/galeri-cewe.php");
} else {
    echo "Error : Akun gagal didaftarkan";
}

?>