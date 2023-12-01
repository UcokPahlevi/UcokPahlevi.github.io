<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Tambah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/tambah-data-siswa.css">
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
            <p class="pro-title">TAMBAH DATA SISWA</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Masukan nis, nama dan jenis kelamin baru untuk menambahkan data baru pada data kelas, jangan lupa untuk menyimpan data setelah selesai.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 pro-set-area">
                <form action="../../../proses/admin/tambah-data-siswa.php" method="post">
                    <div class="pro-form-area">
                    <p class="pro-set-head">NIS :</p>
                    <p class="pro-set-sub-head">Hanya angka dan maksimal 12 karakter</p>
                    <input type="text" class="form-control" name="nis" id="nis" required>
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">NAMA :</p>
                    <p class="pro-set-sub-head">Maksimal 64 karakter</p>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JENIS KELAMIN :</p>
                    <p class="pro-set-sub-head">Perempuan = P / Laki - Laki = L</p>
                    <input type="text" class="form-control" name="jenis_kelamin_ds" id="jenis_kelamin_ds" required>
                    </div>
                    <div class="pro-set-konfirm d-flex justify-content-center">
                        <button type="submit" class="pro-set-konfirm-simpan" onclick="return confirm('Udah selesai?')">Simpan</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/data-kelas/data-siswa.php" 
                        onclick="return confirm('Ga jadi di tambah nih?')">Batal</a>
                    </div>
                </form>
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