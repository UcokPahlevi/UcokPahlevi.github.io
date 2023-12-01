<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Ubah Open House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/edit-open-house.css">
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
            <p class="pro-title">UBAH OPEN HOUSE</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Masukan nama dan kelas baru untuk menggantikan nama dan kelas yang sudah ada, jangan lupa untuk menyimpan perubahan setelah selesai mengubah.</p>
                </div>
            </div>
        </div>
        <?php
        include '../../../koneksi.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $idQuery = "SELECT id, nama, kelas FROM open_house WHERE id = $id";
            $result = $koneksi->query($idQuery);

            if ($result->num_rows == 1) {
                $bagian = $result->fetch_assoc();
                $nama = $bagian['nama'];
                $kelas = $bagian['kelas'];
            } else {
                echo "Data tidak ditemukan.";
            }
        } else {
            echo "ID tidak diberikan.";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $newNama = $_POST['nama'];
            $newKelas = $_POST['kelas'];
        
            $sql_update = "UPDATE open_house SET
            nama = '$newNama', kelas = '$newKelas' WHERE id = $id";
            if ($koneksi->query($sql_update) === TRUE) {
                $_SESSION['alert_berhasil'] = "";
                header("Location: /kelas/page/admin/acara/open-house.php");
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
                    <p class="pro-set-info">Maksimal 64 karakter.</p>
                    <input type="text" class="form-control" name="nama" id="nama"
                        value="<?php echo $bagian["nama"]; ?>" required>
                    </div>
                    <div class="pro-form-area">
                    <p class="pro-set-head">KELAS :</p>
                    <p class="pro-set-info">Maksimal 32 karakter.</p>
                    <input type="text" class="form-control" name="kelas" id="kelas"
                        value="<?php echo $bagian["kelas"]; ?>" required>
                    </div>
                    <div class="pro-set-konfirm d-flex justify-content-center">
                        <button type="submit" class="pro-set-konfirm-simpan" onclick="return confirm('Udah selesai di ubah?')">Simpan</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/acara/open-house.php"
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