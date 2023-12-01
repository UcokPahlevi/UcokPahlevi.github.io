<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Ubah Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/edit-data-siswa.css">
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
                    <p class="pro-sub-title">Masukan nis, nama dan jenis kelamin baru untuk mengubah nis, nama dan jenis kelamin yang sudah ada, jangan lupa untuk menyimpan data setelah selesai mengubah.</p>
                </div>
            </div>
        </div>
        <?php
        include '../../../koneksi.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $idQuery = "SELECT nis, nama, jenis_kelamin_ds FROM data_siswa WHERE nis = $id";
            $result = $koneksi->query($idQuery);

            if ($result->num_rows == 1) {
                $bagian = $result->fetch_assoc();
                $nis = $bagian['nis'];
                $nama = $bagian['nama'];
                $jenis_kelamin_ds = $bagian['jenis_kelamin_ds'];
            } else {
                echo "Data tidak ditemukan.";
            }
        } else {
            echo "ID tidak diberikan.";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama = $_POST['nama'];
            $jenis_kelamin_ds = $_POST['jenis_kelamin_ds'];


            $sql_update = "UPDATE data_siswa SET
            nama = '$nama', jenis_kelamin_ds = '$jenis_kelamin_ds' WHERE nis = $id";
            if ($koneksi->query($sql_update) === TRUE) {
                $_SESSION['alert_berhasil'] = "";
                header("Location: /kelas/page/admin/data-kelas/data-siswa.php");
            } else {
                echo "Error: Data tidak berhasil diperbarui";
            }
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-6 pro-set-area">
                <form action="" method="post">
                    <div class="pro-form-area">
                        <p class="pro-set-head">NIS :</p>
                        <p class="pro-set-sub-head">Hanya angka dan maksimal 12 karakter</p>
                        <input type="text" class="form-control" name="nis" id="nis"
                            value="<?php echo $bagian["nis"]; ?>" required>
                    </div>
                    <div class="pro-form-area">
                        <p class="pro-set-head">NAMA :</p>
                        <p class="pro-set-sub-head">Maksimal 64 karakter</p>
                        <input type="text" class="form-control" name="nama" id="nama"
                            value="<?php echo $bagian["nama"]; ?>" required>
                    </div>
                    <div class="pro-form-area">
                        <p class="pro-set-head">JENIS KELAMIN :</p>
                        <p class="pro-set-sub-head">Perempuan = P / Laki - Laki = L</p>
                        <input type="text" class="form-control" name="jenis_kelamin_ds" id="jenis_kelamin_ds"
                            value="<?php echo $bagian["jenis_kelamin_ds"]; ?>" required>
                    </div>
                    <div class="pro-set-konfirm d-flex justify-content-center">
                        <button type="submit" class="pro-set-konfirm-simpan" onclick="return confirm('Udah selesai di ubah?')">Simpan</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/data-kelas/data-siswa.php"
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