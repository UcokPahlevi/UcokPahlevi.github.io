<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/user/beranda.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/kelas/">XI PPLG A</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <p class="offcanvas-title" id="offcanvasNavbarLabel">XI PPLG A</p>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link aktif" aria-current="page" href="/kelas/">
                                <img class="nav-icon" src="/kelas/assets/icon/navbar/beranda.png" alt="">Beranda</a>
                        </li>
                        <li class="nav-item dropdown drop-1">
                            <a class="nav-link-drop dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><img class="nav-icon" src="/kelas/assets/icon/navbar/acara.png"
                                    alt="">Acara
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="drop-item" href="/kelas/page/user/acara/open-house.php">Open House</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown drop-2">
                            <a class="nav-link-drop dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><img class="nav-icon"
                                    src="/kelas/assets/icon/navbar/data-kelas.png" alt="">Data Kelas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="drop-item" href="/kelas/page/user/data-kelas/data-siswa.php">Data
                                        Siswa</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="drop-item" href="/kelas/page/user/data-kelas/biodata-siswa.php">Biodata
                                        Siswa</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="drop-item" href="/kelas/page/user/data-kelas/struktur-kelas.php">Struktur
                                        Kelas</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="drop-item" href="/kelas/page/user/data-kelas/jadwal-pelajaran.php">Jadwal
                                        Pelajaran</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="drop-item" href="/kelas/page/user/data-kelas/jadwal-piket.php">Jadwal
                                        piket</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="drop-item" href="/kelas/page/user/data-kelas/uang-kas.php">Uang Kas</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/kelas/page/user/galeri.php"><img
                                    class="nav-icon" src="/kelas/assets/icon/navbar/galeri.png" alt="">Galeri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/kelas/page/user/kontak.php"><img
                                    class="nav-icon" src="/kelas/assets/icon/navbar/kontak.png" alt="">Kontak</a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-btn-control">
                                <a class="nav-btn text-center" aria-current="page" href="masuk.php">
                                    <img class="nav-icon-btn" src="/kelas/assets/icon/navbar/pengaturan-akun.png"
                                        alt="">
                                </a>
                            </div>
                            <div class="nav-btn-control-2">
                                <a class="nav-btn-2 text-center" aria-current="page" href="masuk.php">Khusus Admin</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="mobile">
        <div class="row text-center justify-content-center">
            <div class="col-6 col-sm-6 col-md-6">
                <img class="img-fluid" src="/kelas/assets/icon/notifikasi/sorry.png" alt="">
            </div>
            <div class="col-10">
            <p class="m-text">UNTUK SAAT INI HANYA TERSEDIA DI VERSI DESKTOP</p>
            <div class="m-link">
                <a class="m-btn" href="https://wa.me/6289531283960">HUBUNGI ADMIN</a>
            </div>
            </div>
        </div>
    </div>

    <div class="my-carousel">
        <div id="caro-beranda" class="carousel slide" data-bs-ride="true">
            <div class="carousel-inner">
                <?php
                include 'koneksi.php';
                $mulaiAktif = 1;
                $selesaiAktif = 1;
                $mulai = 2;
                $selesai = 3;
                $carouselQueryAktif = "SELECT * FROM carousel WHERE id >= $mulaiAktif LIMIT $selesaiAktif";
                $resultAktif = $koneksi->query($carouselQueryAktif);
                $carouselQuery = "SELECT * FROM carousel WHERE id >= $mulai LIMIT $selesai";
                $result = $koneksi->query($carouselQuery);

                while ($bagian = mysqli_fetch_assoc($resultAktif)) { ?>
                    <div class="carousel-item active" data-bs-interval="2000">
                        <img src="/kelas/assets/images/carousel/<?php echo $bagian["url"]; ?>" class="d-block w-100"
                            alt="...">
                    </div>
                <?php } ?>
                <?php while ($bagian = mysqli_fetch_assoc($result)) { ?>
                    <div class="carousel-item" data-bs-interval="2000">
                        <img src="/kelas/assets/images/carousel/<?php echo $bagian["url"]; ?>" class="d-block w-100"
                            alt="...">
                    </div>
                <?php } ?>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#caro-beranda" data-bs-slide="prev">
                <span aria-hidden="true"><img class="caro-btn-prev" src="/kelas/assets/icon/button/carousel.png"
                        alt=""></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#caro-beranda" data-bs-slide="next">
                <span aria-hidden="true"><img class="caro-btn-next" src="/kelas/assets/icon/button/carousel.png"
                        alt=""></span>
            </button>
        </div>
    </div>

    <div class="wellcome">
        <div class="row">
            <div class="well-area col-sm-12">
                <p class="well-head">XI PPLG A</p>
                <p class="well-text">Selamat datang di website XI PPLG A</p>
            </div>
        </div>
    </div>

    <div class="acara">
        <div class="row justify-content-center">
            <?php
            include 'koneksi.php';
            $acaraQuery = "SELECT * FROM acara";
            $result = $koneksi->query($acaraQuery);

            while ($bagian = mysqli_fetch_assoc($result)) { ?>
                <div class="acr-card col-5">
                    <a class="acr-aja row" href="">
                        <div class="col-sm-3">
                            <img class="img-fluid rounded" src="/kelas/assets/images/acara/<?php echo $bagian["url"] ?>"
                                alt="">
                        </div>
                        <div class="col-9">
                            <p class="acr-head-card">
                                <?php echo $bagian["judul"] ?>
                            </p>
                            <p class="acr-text-card">
                                <?php echo $bagian["deskripsi"] ?>
                            </p>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="data-kelas">
        <div class="dk-layer-1 row">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="dk-area text-center">
                    <img class="dk-icon" src="/kelas/assets/icon/data-kelas/data-siswa.png" alt="">
                    <p class="dk-head">DATA SISWA</p>
                    <p class="dk-text">Data semua siswa/siswi yang ada di XI PPLG A, memiliki 36 siswa, 17 laki - laki
                        dan 19 perempuan</p>
                    <a class="dk-btn" href="/kelas/page/user/data-kelas/data-siswa.php">LIHAT DISINI</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="dk-area text-center">
                    <img class="dk-icon" src="/kelas/assets/icon/data-kelas/biodata-siswa.png" alt="">
                    <p class="dk-head">BIOADATA SISWA</p>
                    <p class="dk-text">Kepo sama orang yang ada di XI PPLG A ? Disini ada data lengkap dari siswa/siswi
                        XI PPLG A</p>
                    <a class="dk-btn" href="/kelas/page/user/data-kelas/biodata-siswa.php">LIHAT DISINI</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="dk-area text-center">
                    <img class="dk-icon" src="/kelas/assets/icon/data-kelas/struktur-kelas.png" alt="">
                    <p class="dk-head">STRUKTUR KELAS</p>
                    <p class="dk-text">Strukrur organisasi kelas. dari mulai ketua kelas, wakil ketua kelas dan masih
                        banyak lagi</p>
                    <a class="dk-btn" href="/kelas/page/user/data-kelas/struktur-kelas.php">LIHAT DISINI</a>
                </div>
            </div>
        </div>
        <div class="dk-layer-2 row">
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="dk-area text-center">
                    <img class="dk-icon" src="/kelas/assets/icon/data-kelas/jadwal-pelajaran.png" alt="">
                    <p class="dk-head">JADWAL PELAJARAN</p>
                    <p class="dk-text">Kalo yang ini buat siswa/siswi XI PPLG A aja, hehee. Tapi kalo mau tau boleh kok
                    </p>
                    <a class="dk-btn" href="/kelas/page/user/data-kelas/jadwal-pelajaran.php">LIHAT DISINI</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="dk-area text-center">
                    <img class="dk-icon" src="/kelas/assets/icon/data-kelas/jadwal-piket.png" alt="">
                    <p class="dk-head">JADWAL PIKET</p>
                    <p class="dk-text">Masih mau pura - pura lupa piket? disini ada jadwal nya lohh, masa masih mau
                        bilang lupa</p>
                    <a class="dk-btn" href="/kelas/page/user/data-kelas/jadwal-piket.php">LIHAT DISINI</a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="dk-area text-center">
                    <img class="dk-icon" src="/kelas/assets/icon/data-kelas/uang-kas.png" alt="">
                    <p class="dk-head">UANG KAS</p>
                    <p class="dk-text">Siapa ya yang jarang bayar uang kas? ga malu apa diliatin orang, yu bayar yu</p>
                    <a class="dk-btn" href="/kelas/page/user/data-kelas/uang-kas.php">LIHAT DISINI</a>
                </div>
            </div>
        </div>
    </div>

    <div class="galeri">
        <div class="gl-control">
            <div class="gl-title d-flex justify-content-between">
                <p class="gl-head">GALERI - XI PPLG A</p>
                <div class="gl-btn-control-deks text-center">
                    <a class="gl-btn-deks" href="/kelas/page/user/galeri.php">LIHAT SEMUA</a>
                </div>
            </div>
            <div class="gl-area">
                <!-- Dekstop -->
                <div id="carousel-galeri" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <?php
                                include 'koneksi.php';
                                $mulai = 1;
                                $selesai = 6;
                                $galeriQuery = "SELECT * FROM galeri_carousel WHERE id >= $mulai LIMIT $selesai";
                                $result = $koneksi->query($galeriQuery);

                                while ($bagian = mysqli_fetch_assoc($result)) { ?>
                                    <div class="col-sm-2">
                                        <img class="img-fluid"
                                            src="/kelas/assets/images/galeri/<?php echo $bagian["url"]; ?>" alt="">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <?php
                                include 'koneksi.php';
                                $mulai = 7;
                                $selesai = 12;
                                $galeriQuery = "SELECT * FROM galeri_carousel WHERE id >= $mulai LIMIT $selesai";
                                $result = $koneksi->query($galeriQuery);

                                while ($bagian = mysqli_fetch_assoc($result)) { ?>
                                    <div class="col-sm-2">
                                        <img class="img-fluid"
                                            src="/kelas/assets/images/galeri/<?php echo $bagian["url"]; ?>" alt="">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-galeri"
                        data-bs-slide="prev">
                        <span aria-hidden="true"><img class="caro-btn-prev" src="/kelas/assets/icon/button/carousel.png"
                                alt=""></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-galeri"
                        data-bs-slide="next">
                        <span aria-hidden="true"><img class="caro-btn-next" src="/kelas/assets/icon/button/carousel.png"
                                alt=""></span>
                    </button>
                </div>
                <!-- Mobile -->
                <div class="gl-mobile">
                    <div class="gl-m-title text-center">
                        <p>GALERI - XI PPLG A</p>
                    </div>
                    <div class="row justify-content-center">
                        <?php
                        include 'koneksi.php';
                        $mulai = 1;
                        $selesai = 9;
                        $galeriQuery = "SELECT * FROM galeri WHERE id >= $mulai LIMIT $selesai";
                        $result = $koneksi->query($galeriQuery);

                        while ($bagian = mysqli_fetch_assoc($result)) { ?>
                            <div class="gl-m-control-img col-4 col-md-4">
                                <img class="img-fluid" src="<?php echo $bagian["semua"]; ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="gl-btn-control text-center">
                    <a class="gl-btn" href="/kelas/page/user/galeri.php">Lihat Semua</a>
                </div>
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