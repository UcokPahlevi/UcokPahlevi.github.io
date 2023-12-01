<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/admin/beranda-admin99.css">
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
                            <a class="nav-link aktif" aria-current="page" href="/kelas/page/admin/">
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
                                    src="/kelas/assets/icon/navbar/data-kelas.png" alt="">Data Kelas
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
                            <a class="nav-link" aria-current="page" href="/kelas/page/admin/kontak.php"><img
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
                                <a class="nav-btn-2 text-center" aria-current="page" href="/kelas/proses/keluar.php"
                                    onclick="return confirm('Yakin mau keluar?')">Keluar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="my-carousel" id="notip-upload-carousel2">
        <div class="caro-title-area text-center">
            <p class="caro-title">PENGATURAN CAROUSEL</p>
            <div class="row justify-content-center">
                <div class="col-lg-5 mb-5">
                    <p class="caro-sub-title">Hanya dapat mengubah foto, tidak dapat menambah / menghapus.</p>
                </div>
            </div>
            <div class="alert-area row justify-content-center">
                <div class="col-lg-6">
                    <?php if (isset($_SESSION['alert-upload-carousel'])) { ?>
                        <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between"
                            role="alert">
                            <p class="dt-alert-text">
                                <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                                Foto berhasil di tambahkan!
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['alert-upload-carousel']);
                    } ?>
                </div>
            </div>
            <div class="alert-area row justify-content-center">
                <div class="col-lg-6">
                    <?php if (isset($_SESSION['alert-hapus-carousel'])) { ?>
                        <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between"
                            role="alert">
                            <p class="dt-alert-text">
                                <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                                Foto berhasil di hapus!
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['alert-hapus-carousel']);
                    } ?>
                </div>
            </div>
            <div class="alert-area row justify-content-center">
                <div class="col-lg-6">
                    <?php if (isset($_SESSION['alert-ganti-carousel'])) { ?>
                        <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between"
                            role="alert">
                            <p class="dt-alert-text">
                                <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                                Foto berhasil di ganti!
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['alert-ganti-carousel']);
                    } ?>
                </div>
            </div>
        </div>
        <div class="row area justify-content-between text-center">
            <div class="caro-kumpulan">
                <div class="caro-kum-title-area text-center">
                    <p class="caro-kum-title">KUMPULAN FOTO CAROUSEL</p>
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <p class="caro-sub-title">Kumpulan foto yang di gunakan untuk mengubah foto carousel.</p>
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['gagalHapus'])) {
                    echo '<p class="caro-error text-center">' . $_SESSION['gagalHapus'] . '</p>';
                    unset($_SESSION['gagalHapus']);
                }
                ?>
                <div class="row caro-kum-img-area" id="notip-upload-carousel">
                    <?php
                    include '../../koneksi.php';
                    $carouselQuery = "SELECT * FROM pilih_carousel";
                    $result = $koneksi->query($carouselQuery);

                    while ($bagian = mysqli_fetch_assoc($result)) { ?>
                        <div class="caro-kum-img col-lg-4">
                            <img class="img-fluid" src="/kelas/assets/images/carousel/<?php echo $bagian["url"]; ?>" alt="">
                            <div class="caro-kum-hapus">
                                <a class="caro-kum-hapus-btn" onclick="return confirm('Yakin mau dihapus?')"
                                    href="/kelas/proses/admin/hapus-carousel.php?id=<?= $bagian["id"]; ?>">Hapus foto</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="caro-kum-upload">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center">
                                <p class="caro-kum-head">Tambahkan foto baru :</p>
                            </div>
                            <div class="row justify-content-center text-center">
                                <div class="col-lg-12">
                                    <p class="caro-kum-sub-title">Ekstensi harus berupa ( jpg / jpeg / png )</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <form action="../../proses/admin/upload-carousel.php" class="pro-file-area d-flex"
                                    method="post" enctype="multipart/form-data">
                                    <input type="file" class="form-control" name="gambar" id="gambar">
                                    <button type="submit" class="caro-kum-btn">oke</button>
                                </form>
                            </div>
                            <?php
                            if (isset($_SESSION['error'])) {
                                echo '<p class="caro-error text-center">' . $_SESSION['error'] . '</p>';
                                unset($_SESSION['error']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="caro-line-content">
            <?php
            include '../../koneksi.php';
            $NO = 1;
            $carouselQuery = "SELECT * FROM carousel";
            $result = $koneksi->query($carouselQuery);

            while ($bagian = mysqli_fetch_assoc($result)) { ?>
                <div class="col-lg-8 caro-area-l">
                    <img class="img-fluid" src="/kelas/assets/images/carousel/<?php echo $bagian["url"]; ?>" alt="">
                </div>
                <div class="col-lg-4 caro-area-r">
                    <p class="caro-head">CAROUSEL :
                        <?php echo $NO; ?>
                    </p>
                    <a class="caro-btn-l"
                        href="/kelas/page/admin/pengaturan/ganti-foto-carousel.php?id=<?= $bagian["id"]; ?>">GANTI
                        FOTO</a>
                </div>
                <hr class="caro-line-content">
                <?php $NO++;
            } ?>
        </div>
    </div>

    <div class="acara" id="notip-acara">
        <div class="acr-title-area text-center">
            <p class="acr-title">PENGATURAN ACARA</p>
            <div class="row justify-content-center">
                <div class="col-lg-5 mb-5">
                    <p class="acr-sub-title">Dapat menambahkan konten baru, mengedit konten yang sudah di buat dan
                        menghapus konten yang sudah tidak di gunakan. </p>
                </div>
            </div>
            <div class="alert-area row justify-content-center">
                <div class="col-lg-6">
                    <?php if (isset($_SESSION['alert-edit-acara'])) { ?>
                        <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between"
                            role="alert">
                            <p class="dt-alert-text">
                                <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                                Acara berhasil di ubah!
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['alert-edit-acara']);
                    } ?>
                </div>
            </div>
            <div class="alert-area row justify-content-center">
                <div class="col-lg-6">
                    <?php if (isset($_SESSION['alert-tambah-acara'])) { ?>
                        <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between"
                            role="alert">
                            <p class="dt-alert-text">
                                <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                                Acara berhasil di tambahkan!
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['alert-tambah-acara']);
                    } ?>
                </div>
            </div>
            <div class="alert-area row justify-content-center">
                <div class="col-lg-6">
                    <?php if (isset($_SESSION['alert-hapus-acara'])) { ?>
                        <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between"
                            role="alert">
                            <p class="dt-alert-text">
                                <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                                Acara berhasil di hapus!
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['alert-hapus-acara']);
                    } ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            include '../../koneksi.php';
            $acaraQuery = "SELECT * FROM acara";
            $result = $koneksi->query($acaraQuery);

            while ($bagian = mysqli_fetch_assoc($result)) { ?>
                <div class="acr-card col-5 mt-4">
                    <div class="acr-aja row">
                        <div class="col-3">
                            <img class="img-fluid rounded" src="/kelas/assets/images/acara/<?php echo $bagian["url"] ?>"
                                alt="">
                        </div>
                        <div class="col-9">
                            <div class="d-flex justify-content-between">
                                <p class="acr-head-card">
                                    <?php echo $bagian["judul"] ?>
                                </p>
                                <div class="acr-set-area">
                                    <a class="acr-set-edit"
                                        href="/kelas/page/admin/pengaturan/edit-acara.php?id=<?= $bagian["id"]; ?>"><img
                                            class="acr-set-icon" src="/kelas/assets/icon/button/edit.png" alt=""></a>
                                    <a class="acr-set-hapus" onclick="return confirm('Yakin mau dihapus?')"
                                        href="/kelas/proses/admin/hapus-acara.php?id=<?= $bagian["id"]; ?>"><img
                                            class="acr-set-icon" src="/kelas/assets/icon/button/hapus.png" alt=""></a>
                                </div>
                            </div>
                            <p class="acr-text-card">
                                <?php echo $bagian["deskripsi"] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="acr-tambah-area text-center">
            <a class="acr-tambah" href="/kelas/page/admin/pengaturan/tambah-acara.php">+ TAMBAHKAN KONTEN</a>
        </div>
    </div>

    <div class="galeri" id="notip-galeri">
        <div class="gl-title-area text-center">
            <p class="gl-title">PENGATURAN GALERI</p>
            <div class="row justify-content-center">
                <div class="col-lg-5 mb-5">
                    <p class="gl-sub-title">Hanya dapat mengubah foto, tidak dapat menambah / menghapus.</p>
                </div>
            </div>
            <div class="alert-area row justify-content-center">
                <div class="col-lg-6">
                    <?php if (isset($_SESSION['alert-ganti-galeri'])) { ?>
                        <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between"
                            role="alert">
                            <p class="dt-alert-text">
                                <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                                Galeri berhasil di ganti!
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['alert-ganti-galeri']);
                    } ?>
                </div>
            </div>
        </div>
        <div class="gl-set-area">
            <div class="row gl-row justify-content-center text-center">
                <?php
                include '../../koneksi.php';
                $mulai = 1;
                $selesai = 6;
                $galeriQuery = "SELECT * FROM galeri_carousel WHERE id >= $mulai LIMIT $selesai";
                $result = $koneksi->query($galeriQuery);

                while ($bagian = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-lg-2">
                        <img class="img-fluid" src="/kelas/assets/images/galeri/<?php echo $bagian["url"]; ?>" alt="">
                        <div class="gl-set-btn-control">
                            <a class="gl-set-btn"
                                href="/kelas/page/admin/pengaturan/ganti-foto-carousel-galeri.php?id=<?= $bagian["id"]; ?>">GANTI
                                FOTO</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row gl-row justify-content-center text-center">
                <?php
                include '../../koneksi.php';
                $mulai = 7;
                $selesai = 6;
                $galeriQuery = "SELECT * FROM galeri_carousel WHERE id >= $mulai LIMIT $selesai";
                $result = $koneksi->query($galeriQuery);

                while ($bagian = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-lg-2">
                        <img class="img-fluid" src="/kelas/assets/images/galeri/<?php echo $bagian["url"]; ?>" alt="">
                        <div class="gl-set-btn-control">
                            <a class="gl-set-btn"
                                href="/kelas/page/admin/pengaturan/ganti-foto-carousel-galeri.php?id=<?= $bagian["id"]; ?>">GANTI
                                FOTO</a>
                        </div>
                    </div>
                <?php } ?>
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