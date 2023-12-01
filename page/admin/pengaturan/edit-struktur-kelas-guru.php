<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Ubah Struktur Kelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/edit-struktur-kelas.css">
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
            <p class="pro-title">UBAH STRUKTUR KELAS</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Pilih salah satu nama untuk mengubah nama yang sudah di pilih sebelumnya,
                        jangan lupa untuk menyimpan perubahan setelah selesai mengubah.</p>
                </div>
            </div>
        </div>
        <?php
        include '../../../koneksi.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $idQuery = "SELECT * FROM struktur_kelas
            INNER JOIN data_guru ON struktur_kelas.nis_nik = data_guru.nik
            WHERE id = $id";
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

            $newNik = $_POST['nis_nik'];

            $sql_update = "UPDATE struktur_kelas SET
            nis_nik = '$newNik' WHERE id = $id";
            if ($koneksi->query($sql_update) === TRUE) {
                $_SESSION['alert_berhasil'] = "";
                header("Location: /kelas/page/admin/data-kelas/struktur-kelas.php");
            } else {
                echo "Error: Data tidak berhasil diperbarui";
            }
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-5 pro-set-area">
                <form action="" method="post">
                    <div class="pro-set-title text-center">
                        <p class="pro-set-head">GANTI
                            <?php echo $bagian["keterangan"] ?>
                        </p>
                    </div>
                    <div class="pro-set-img-area">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <img class="img-fluid rounded"
                                    src="/kelas/assets/images/foto-guru/<?php echo $bagian["foto_guru"] ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <p class="pro-set-info text-center">Pilih salah satu nama dibawah ini :</p>
                    <div class="pro-form-area">
                        <select class="form-select" name="nis_nik">
                            <option class="form-select" selected value="<?php echo $bagian["nik"]; ?>">
                                <?php echo $bagian["nama_guru"]; ?>
                            </option>
                            <?php
                            $tabelQuery = "SELECT * FROM data_guru";
                            $result = $koneksi->query($tabelQuery);

                            while ($bagian2 = mysqli_fetch_assoc($result)) {
                                ?>
                                <option class="form-option" value="<?php echo $bagian2["nik"]; ?>">
                                    <?php echo $bagian2["nama_guru"]; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="pro-set-konfirm d-flex justify-content-center">
                        <button type="submit" class="pro-set-konfirm-simpan"
                            onclick="return confirm('Udah selesai di ubah?')">Simpan</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/data-kelas/struktur-kelas.php"
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>