<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Jadwal Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/admin/data-kelas/jadwal-pelajaran.css">
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
                            <a class="nav-link-drop-aktif dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"><img class="nav-icon"
                                    src="/kelas/assets/icon/navbar/data-kelas.png" alt="">JADWAL PELAJARAN
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
                                <li><a class="drop-item-aktif"
                                        href="/kelas/page/admin/data-kelas/jadwal-pelajaran.php">Jadwal
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
                            <a class="nav-link" aria-current="page" href="/kelas/page/admin/kontak.php"><img
                                    class="nav-icon" src="/kelas/assets/icon/navbar/kontak.png" alt="">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-btn-control">
                                <a class="nav-btn text-center" aria-current="page"
                                    href="/kelas/proses/keluar.php" onclick="return confirm('Yakin mau keluar?')">
                                    <img class="nav-icon-btn" src="/kelas/assets/icon/navbar/keluar.png"
                                        alt="">
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

    <div class="jadwal-pelajaran">
        <div class="jp-title-area text-center">
            <p class="jp-title">JADWAL PELAJARAN</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="jp-sub-title">Dapat menambahkan pelajaran baru, mengubah pelajaran yang sudah ada dan menghapus pelajaran yang sudah tidak di gunakan.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-start mt-0 mb-0">
            <div class="col-lg-3">
                <?php if (isset($_SESSION['alert_hapus'])) { ?>
                    <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between" role="alert">
                        <p class="dt-alert-text">
                            <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                            Data berhasil di hapus!
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['alert_hapus']);
                } ?>
            </div>
        </div>
        <div class="row justify-content-start mt-0 mb-0">
            <div class="col-lg-3">
                <?php if (isset($_SESSION['alert_berhasil'])) { ?>
                    <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between" role="alert">
                        <p class="dt-alert-text">
                            <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                            Data berhasil di ubah!
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['alert_berhasil']);
                } ?>
            </div>
        </div>
        <div class="row justify-content-start mt-0 mb-0">
            <div class="col-lg-3">
                <?php if (isset($_SESSION['alert_tambah'])) { ?>
                    <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between" role="alert">
                        <p class="dt-alert-text">
                            <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                            Data berhasil di tambahkan!
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['alert_tambah']);
                } ?>
            </div>
        </div>
        <div class="d-flex justify-content-between">
        <?php
                include '../../../koneksi.php';
                $tabelQuery = "SELECT * FROM keterangan_jadwal_pelajaran";
                $result = $koneksi->query($tabelQuery);

                while ($bagian_2 = mysqli_fetch_assoc($result)) {
                    ?>
            <p class="jp-head-info">JADWAL <?php echo $bagian_2['blok'] ?> <span class="jp-hl-info">SEMESTER  <?php echo $bagian_2['semester'] ?></span></p>
            <div class="jp-set-area">
                <a class="jp-set-btn" href="/kelas/page/admin/pengaturan/edit-keterangan-jp.php?id=<?= $bagian_2["id"]; ?>">UBAH KETERANGAN</a>
            </div>
        </div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="jp-head">HARI</th>
                    <th class="jp-head">1</th>
                    <th class="jp-head">2</th>
                    <th class="jp-head">3</th>
                    <th class="jp-head">4</th>
                    <th class="jp-head">ISTIRAHAT</th>
                    <th class="jp-head">5</th>
                    <th class="jp-head">6</th>
                    <th class="jp-head">7</th>
                    <th class="jp-head">ISTIRAHAT</th>
                    <th class="jp-head">8</th>
                    <th class="jp-head">9</th>
                    <th class="jp-head">10</th>
                    <th class="jp-head">11</th>
                    <th class="jp-head">12</th>
                    <th class="jp-head">
                        <img class="jp-set-head-icon" src="/kelas/assets/icon/button/pengaturan.png" alt="">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../../../koneksi.php';
                $tabelQuery = "SELECT * FROM jadwal_pelajaran";
                $result = $koneksi->query($tabelQuery);

                while ($bagian = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>
                        <td class="jp-data">
                            <?php echo $bagian['hari'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_1'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_2'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_3'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_4'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['istirahat_1'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_5'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_6'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_7'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['istirahat_2'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_8'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_9'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_10'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_11'] ?>
                        </td>
                        <td class="jp-data">
                            <?php echo $bagian['jam_12'] ?>
                        </td>
                        <td class="jp-data">
                            <div class="jp-set-area">
                                <a class="jp-set-edit"
                                    href="/kelas/page/admin/pengaturan/edit-jadwal-pelajaran.php?id=<?= $bagian["id"]; ?>"><img
                                        class="jp-set-icon" src="/kelas/assets/icon/button/edit.png" alt=""></a>
                                <a class="jp-set-hapus" onclick="return confirm('Yakin mau dihapus?')"
                                    href="/kelas/proses/admin/hapus-jadwal-pelajaran.php?id=<?= $bagian["id"]; ?>"><img
                                        class="jp-set-icon" src="/kelas/assets/icon/button/hapus.png" alt=""></a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="jp-ket-area d-flex justify-content-between">
            <p class="jp-text-info">HARI JUM'AT TIDAK ADA ISTIRAHAT PAGI ( <?php echo $bagian_2['ruangan'] ?> )</p>
            <div class="jp-set-area-2">
                <a class="jp-set-btn" href="/kelas/page/admin/pengaturan/tambah-jadwal-pelajaran.php">+ TAMBAHKAN
                    JADWAL</a>
            </div>
            <?php } ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>