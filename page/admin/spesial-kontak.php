<?php

include '../../koneksi.php';

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function cariKontak($keyword) {
    $query = "SELECT * FROM kontak WHERE nama LIKE '%$keyword%' OR kategori LIKE '%$keyword%' ";
    return query($query);
}
?>