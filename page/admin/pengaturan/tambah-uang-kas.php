<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Tambah Uang Kas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/tambah-uang-kas.css">
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
            <p class="pro-title">TAMBAH UANG KAS</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Pilih nama dan bulan untuk menambahkan data baru pada uang kas, jangan lupa untuk menyimpan data setelah selesai.</p>
                </div>
            </div>
        </div>
        <?php
        include '../../../koneksi.php';
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-6 pro-set-area">
                <form action="../../../proses/admin/tambah-uang-kas.php" method="post">
                    <div class="pro-form-area">
                        <p class="pro-set-head">NAMA :</p>
                        <select class="form-select" name="nama">
                            <option selected value="NONE">
                                PILIH NAMA
                            </option>
                            <?php
                            $tabelQuery = "SELECT * FROM data_siswa";
                            $result = $koneksi->query($tabelQuery);

                            while ($bagian2 = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $bagian2["nama"]; ?>"><?php echo $bagian2["nama"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="pro-form-area">
                        <p class="pro-set-head">BULAN :</p>
                        <select class="form-select" name="bulan">
                            <option selected value="NONE">
                                PILIH BULAN
                            </option>
                            <option value="januari">
                                JANUARI
                            </option>
                            <option value="februari">
                                FEBRUARI
                            </option>
                            <option value="maret">
                                MARET
                            </option>
                            <option value="april">
                                APRIL
                            </option>
                            <option value="mei">
                                MEI
                            </option>
                            <option value="juni">
                                JUNI
                            </option>
                            <option value="juli">
                                JULI
                            </option>
                            <option value="agustus">
                                AGUSTUS
                            </option>
                            <option value="september">
                                SEPTEMBER
                            </option>
                            <option value="oktober">
                                OKTOBER
                            </option>
                            <option value="november">
                                NOVEMBER
                            </option>
                            <option value="desember">
                                DESEMBER
                            </option>
                        </select>
                    </div>
                    <div class="pro-set-konfirm d-flex justify-content-center">
                        <button type="submit" class="pro-set-konfirm-simpan" onclick="return confirm('Udah selesai?')">Simpan</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/data-kelas/uang-kas.php" onclick="return confirm('Ga jadi di tambah nih?')">Batal</a>
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