<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Ubah Jadwal Piket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/edit-uang-kas.css">
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
            <p class="pro-title">UBAH DATA SISWA</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Pilih status atau bulan baru untuk mengubah status dan bulan yang sudah
                        ada, jangan lupa untuk menyimpan perubahan setelah selesai mengubah.</p>
                </div>
            </div>
        </div>
        <?php
        include '../../../koneksi.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $idQuery = "SELECT * FROM uang_kas WHERE id_kas = $id";
            $result = $koneksi->query($idQuery);

            if ($result->num_rows == 1) {
                $bagian = $result->fetch_assoc();
            } else {
                echo "Data tidak ditemukan.";
            }
        } else {
            echo "ID tidak diberikan.";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $m1 = $_POST['minggu_1'];
            $m2 = $_POST['minggu_2'];
            $m3 = $_POST['minggu_3'];
            $m4 = $_POST['minggu_4'];
            $bulan = $_POST['bulan'];

            $sql_update = "UPDATE uang_kas SET
            minggu_1 = '$m1', minggu_2 = '$m2'
            , minggu_3 = '$m3', minggu_4 = '$m4', bulan = '$bulan'
            WHERE id_kas = $id";
            if ($koneksi->query($sql_update) === TRUE) {
                $_SESSION['alert_berhasil'] = "";
                header("Location: /kelas/page/admin/data-kelas/uang-kas.php");
            } else {
                echo "Error: Data tidak berhasil diperbarui";
            }
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-6 pro-set-area">
                <form action="" method="post">
                    <div class="pro-form-area">
                        <p class="pro-set-head">NAMA :</p>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="<?php echo $bagian["nama"]; ?>" disabled>
                    </div>
                    <div class="pro-form-area">
                        <p class="pro-set-head">MINGGU 1 :</p>
                        <select class="form-select" name="minggu_1">
                            <option selected value="<?php echo $bagian["minggu_1"]; ?>">
                                <p>STATUS SEBELUMNYA : </p>
                                <?php echo $bagian["minggu_1"]; ?>
                            </option>
                            <option value="sudah">
                                SUDAH
                            </option>
                            <option value="belum">
                                BELUM
                            </option>
                        </select>
                    </div>
                    <div class="pro-form-area">
                        <p class="pro-set-head">MINGGU 2 :</p>
                        <select class="form-select" name="minggu_2">
                            <option selected value="<?php echo $bagian["minggu_2"]; ?>">
                                <p>STATUS SEBELUMNYA : </p>
                                <?php echo $bagian["minggu_2"]; ?>
                            </option>
                            <option value="sudah">
                                SUDAH
                            </option>
                            <option value="belum">
                                BELUM
                            </option>
                        </select>
                    </div>
                    <div class="pro-form-area">
                        <p class="pro-set-head">MINGGU 3 :</p>
                        <select class="form-select" name="minggu_3">
                            <option selected value="<?php echo $bagian["minggu_3"]; ?>">
                                <p>STATUS SEBELUMNYA : </p>
                                <?php echo $bagian["minggu_3"]; ?>
                            </option>
                            <option value="sudah">
                                SUDAH
                            </option>
                            <option value="belum">
                                BELUM
                            </option>
                        </select>
                    </div>
                    <div class="pro-form-area">
                        <p class="pro-set-head">MINGGU 4 :</p>
                        <select class="form-select" name="minggu_4">
                            <option selected value="<?php echo $bagian["minggu_4"]; ?>">
                                <p>STATUS SEBELUMNYA : </p>
                                <?php echo $bagian["minggu_4"]; ?>
                            </option>
                            <option value="sudah">
                                SUDAH
                            </option>
                            <option value="belum">
                                BELUM
                            </option>
                        </select>
                    </div>
                    <div class="pro-form-area">
                        <p class="pro-set-head">BULAN :</p>
                        <select class="form-select" name="bulan">
                            <option selected value="<?php echo $bagian["bulan"]; ?>">
                                <p>BULAN SEBELUMNYA : </p>
                                <?php echo $bagian["bulan"]; ?>
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
                        <button type="submit" class="pro-set-konfirm-simpan"
                            onclick="return confirm('Udah selesai di ubah?')">Simpan</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/data-kelas/uang-kas.php"
                            onclick="return confirm('Ga jadi di ubah nih?')">Batal</a>
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