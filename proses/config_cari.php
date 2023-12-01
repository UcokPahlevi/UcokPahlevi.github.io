<?php

include '../../../koneksi.php';

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword) {
    $query = "SELECT * FROM data_siswa WHERE nis LIKE '%$keyword%' OR nama LIKE '%$keyword%' ";
    return query($query);
}
function cariKas($keyword) {
    $query = "SELECT * FROM uang_kas WHERE nama LIKE '%$keyword%' ";
    return query($query);
}
function cariDs($keyword) {
    $query = "SELECT * FROM data_siswa WHERE nis LIKE '%$keyword%' OR nama LIKE '%$keyword%' ";
    return query($query);
}
function cariBs($keyword) {
    $query = "SELECT * FROM data_siswa WHERE nis LIKE '%$keyword%' OR nama LIKE '%$keyword%' ";
    return query($query);
}
function cariKontak($keyword) {
    $query = "SELECT * FROM kontak WHERE nama LIKE '%$keyword%' OR kategori LIKE '%$keyword%' ";
    return query($query);
}
function cariOh($keyword) {
    $query = "SELECT * FROM open_house WHERE nama LIKE '%$keyword%' OR kelas LIKE '%$keyword%' ";
    return query($query);
}
?>