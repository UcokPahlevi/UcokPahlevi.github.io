<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Tambah Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/tambah-galeri.css">
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
            <p class="navbar-brand">XI PPLG A</p>
        </div>
    </nav>

    <div class="proses">
        <div class="pro-title-area text-center">
            <p class="pro-title">TAMBAH GALERI</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Hanya dapat mengupload foto dengan ekstensi jpg, jpeg & png, keterangan maksimal
                        64 karakter dan tanggal di isi dengan tanggal foto diambil.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <form action="../../../proses/admin/tambah-galeri-cewe.php" method="post" class="col-lg-6 pro-edit-area"
                enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="pro-set-left col-lg-6 text-center">
                        <div class="pro-set-left-up">
                            <p class="pro-set-left-head">FOTO GALERI / SEMUA</p>
                            <img class="pro-set-img img-fluid" src="/kelas/assets/images/acara/750.png" alt="">
                        </div>
                        <div class="pro-set-left-down">
                            <p class="pro-set-left-head">UPLOAD FOTO GALERI :</p>
                            <div class="row justify-content-center text-center">
                                <div class="col-lg-12">
                                    <p class="pro-info-title">Ekstensi harus berupa ( jpg / jpeg / png )
                                    </p>
                                </div>
                            </div>
                            <div>
                                <input type="file" class="form-control" name="gambar" id="gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                <div class="pro-set-right col-lg-8">
                    <div class="pro-set-right-up">
                        <p class="pro-set-right-head">KETERANGAN :</p>
                        <p class="pro-set-right-sub-head">Maksimal 64 karakter</p>
                        <textarea type="text" class="form-control" name="keterangan" id="keterangan" autocomplete="off" required></textarea>
                    </div>
                    <div class="pro-set-right-down">
                        <p class="pro-set-right-head">TANGGAL :</p>
                        <p class="pro-set-right-sub-head">Tanggal foto diambil</p>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                            autocomplete="off" required>
                    </div>
                    <input type="hidden" class="form-control" name="kategori" id="kategori"
                            autocomplete="off" value="cewe" required>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo '<p class="pro-error text-center">' . $_SESSION['error'] . '</p>';
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="pro-set-konfirm d-flex justify-content-center">
                        <button type="submit" class="pro-set-konfirm-simpan" onclick="return confirm('Udah selesai?')">tambah</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/galeri/galeri-cewe.php" onclick="return confirm('Ga jadi ditambah nih?')">Batal</a>
                    </div>
                </div>
                </div>
            </form>
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