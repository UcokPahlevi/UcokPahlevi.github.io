<?php
session_start();
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $jenis_kelamin_ds = $_POST['jenis_kelamin_ds'];


    $sql = "INSERT INTO data_siswa (nama, jenis_kelamin_ds)
             VALUES ('$nama', '$jenis_kelamin_ds')";
}

if ($koneksi->query($sql) === TRUE) {
    $_SESSION['alert_tambah'] = "";
    header("Location: /kelas/page/admin/data-kelas/data-siswa.php");
} else {
    echo "Error : Pesan tidak terkirim";
}
?>