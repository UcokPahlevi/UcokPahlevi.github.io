<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Edit Jadwal Pelajaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/tambah-jadwal-pelajarana.css">
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
            <p class="pro-title">TAMBAH JADWAL PELAJARAN</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Masukan jadwal baru untuk menambahkan jadwal baru pada jadwal pelajaran, jangan lupa untuk menyimpan jadwal setelah selesai.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 pro-set-area">
                <form action="../../../proses/admin/tambah-jadwal-pelajaran.php" method="post">
                    <div class="pro-form-area">
                    <p class="pro-set-head">HARI :</p>
                    <p class="pro-set-sub-head">Senin - Jum'at</p>
                    <input type="text" class="form-control" name="hari" id="hari"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-1 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_1" id="jam_1"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-2 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_2" id="jam_2"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-3 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_3" id="jam_3"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-4 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_4" id="jam_4"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">ISTIRAHAT KE-1 :</p>
                    <p class="pro-set-sub-head">20 Menit / 40 Menit ( Menit = M )</p>
                    <input type="text" class="form-control" name="istirahat_1" id="istirahat_1"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-5 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_5" id="jam_5"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-6 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_6" id="jam_6"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-7 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_7" id="jam_7"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">ISTIRAHAT KE-2 :</p>
                    <p class="pro-set-sub-head">20 Menit / 40 Menit ( Menit = M )</p>
                    <input type="text" class="form-control" name="istirahat_2" id="istirahat_2"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-8 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_8" id="jam_8"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-9 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_9" id="jam_9"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-10 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_10" id="jam_10"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-11 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_11" id="jam_11"
                        autocomplete="off">
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">JAM KE-12 :</p>
                    <p class="pro-set-sub-head">Minimal 1 karakter / Maksimal 4 karakter</p>
                    <input type="text" class="form-control" name="jam_12" id="jam_12"
                        autocomplete="off">
                    </div>
                    <div class="pro-set-konfirm d-flex justify-content-center">
                        <button type="submit" class="pro-set-konfirm-simpan" onclick="return confirm('Udah selesai?')">Tambah</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/data-kelas/jadwal-pelajaran.php" onclick="return confirm('Ga jadi di tambah nih?')">Batal</a>
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

    <script src="/kelas/js/pilih-foto.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>