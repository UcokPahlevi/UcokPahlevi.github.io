<?php
include 'spesial-kontak.php';

$NO = 1;
$kontak = query("SELECT * FROM kontak");

if (isset($_POST["cari"])) {
    $kontak = cariKontak($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/admin/kontaks.css">
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: /kelas/");
        exit();
    }

    $username = $_SESSION['username'];
    ?>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/kelas/page/admin/">XI PPLG A</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <p class="offcanvas-title" id="offcanvasNavbarLabel">Hello,
                        <?php echo $_SESSION["username"]; ?>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/kelas/page/admin/">
                                <img class="nav-icon" src="/kelas/assets/icon/navbar/beranda.png" alt="">Beranda</a>
                        </li>
                        <li class="nav-item dropdown drop-1">
                            <a class="nav-link-drop dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><img class="nav-icon" src="/kelas/assets/icon/navbar/acara.png"
                                    alt="">Acara
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="drop-item" href="/kelas/page/admin/acara/open-house.php">Open House</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown drop-2">
                            <a class="nav-link-drop dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><img class="nav-icon"
                                    src="/kelas/assets/icon/navbar/data-kelas.png" alt="">Data Siswa
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="drop-item" href="/kelas/page/admin/data-kelas/data-siswa.php">Data
                                        Siswa</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="drop-item" href="/kelas/page/admin/data-kelas/biodata-siswa.php">Biodata
                                        Siswa</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="drop-item" href="/kelas/page/admin/data-kelas/struktur-kelas.php">Struktur
                                        Kelas</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="drop-item" href="/kelas/page/admin/data-kelas/jadwal-pelajaran.php">Jadwal
                                        Pelajaran</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="drop-item" href="/kelas/page/admin/data-kelas/jadwal-piket.php">Jadwal
                                        piket</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="drop-item" href="/kelas/page/admin/data-kelas/uang-kas.php">Uang Kas</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/kelas/page/admin/galeri.php"><img
                                    class="nav-icon" src="/kelas/assets/icon/navbar/galeri.png" alt="">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link aktif" aria-current="page" href="/kelas/page/admin/kontak.php"><img
                                    class="nav-icon" src="/kelas/assets/icon/navbar/kontak.png" alt="">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-btn-control">
                                <a class="nav-btn text-center" aria-current="page" href="/kelas/proses/keluar.php"
                                onclick="return confirm('Yakin mau keluar?')">
                                    <img class="nav-icon-btn" src="/kelas/assets/icon/navbar/keluar.png" alt="">
                                </a>
                            </div>
                            <div class="nav-btn-control-2">
                                <a class="nav-btn-2 text-center" aria-current="page"
                                    href="/kelas/proses/keluar.php" onclick="return confirm('Yakin mau keluar?')">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="kontak">
        <div class="kt-title-area text-center">
            <p class="kt-title">KONTAK</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="kt-sub-title">Hanya dapat menghapus, tidak dapat menambah / mengubah.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5 mb-0">
            <div class="col-lg-4">
                <?php if (isset($_SESSION['alert_hapus'])) { ?>
                    <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between" role="alert">
                        <p class="dt-alert-text">
                            <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                            Data berhasil dihapus!
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['alert_hapus']);
                } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form class="d-flex" action="" method="post">
                    <input class="form-control me-2" type="text" placeholder="Cari berdasarkan nama / kategori"
                                autocomplete="off" name="keyword">
                    <button class="kt-btn-src" type="submit" name="cari"><img class="kt-src-icon"
                            src="/kelas/assets/icon/button/cari.png" alt=""></button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="tabel col-12 col-sm-10 col-md-10 col-lg-10">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th class="tb-head">NO</th>
                            <th class="tb-head">NAMA</th>
                            <th class="tb-head">KATEGORI</th>
                            <th class="tb-head">PESAN</th>
                            <th class="tb-head">
                                <img class="kt-set-head-icon" src="/kelas/assets/icon/button/pengaturan.png" alt="">
                            </th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($kontak as $row):
                        ?>
                        <tr>
                            <td class="tb-data text-center">
                                <?php echo $NO ?>
                            </td>
                            <td class="tb-data">
                                <?php echo $row['nama'] ?>
                            </td>
                            <td class="tb-data">
                                <?php echo $row['kategori'] ?>
                            </td>
                            <td class="tb-data">
                                <?php echo $row['pesan'] ?>
                            </td>
                            <td class="tb-data text-center">
                                <div class="kt-set-area">
                                    <a class="kt-set-hapus" onclick="return confirm('Yakin mau dihapus?')"
                                        href="/kelas/proses/admin/hapus-kontak.php?id=<?= $row["id_kontak"] ?>"><img
                                            class="kt-set-icon" src="/kelas/assets/icon/button/hapus.png" alt=""></a>
                                </div>
                            </td>
                        </tr>
                        <?php $NO++;
                    endforeach ?>
                </table>
            </div>
        </div>
    </div>

    <div class="my-footer">
        <footer class="foot-area text-center">
            <div class="foot-head">
                <p class="head">XI PPLG A - SMKN 4 PADALARANG</p>
            </div>
            <div class="foot-text">
                <p class="text">Copyright &copy; 2023 UcokPahlevi</p>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>