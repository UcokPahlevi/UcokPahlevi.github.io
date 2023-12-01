<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + UBAH Jadwal Piket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/edit-jadwal-siswa9.css">
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
            <p class="pro-title">EDIT JADWAL PELAJARAN</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Masukan jadwal baru untuk mengubah jadwal yang sudah tidak di gunakan, jangan lupa untuk menyimpan perubahan setelah selesai.
</p>
                </div>
            </div>
        </div>
        <?php
        include '../../../koneksi.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $idQuery = "SELECT * FROM jadwal_piket WHERE id = $id";
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

            $newNama1 = $_POST['nama_1'];
            $newNama2 = $_POST['nama_2'];
            $newNama3 = $_POST['nama_3'];
            $newNama4 = $_POST['nama_4'];
            $newNama5 = $_POST['nama_5'];
            $newNama6 = $_POST['nama_6'];
            $newNama7 = $_POST['nama_7'];
            $newNama8 = $_POST['nama_8'];

            $sql_update = "UPDATE jadwal_piket SET
            nama_1 = '$newNama1', nama_2 = '$newNama2', nama_3 = '$newNama3'
            , nama_4 = '$newNama4', nama_5 = '$newNama5', nama_6 = '$newNama6'
            , nama_7 = '$newNama7', nama_8 = '$newNama8' WHERE id = $id";
            if ($koneksi->query($sql_update) === TRUE) {
                $_SESSION['alert_berhasil'] = "";
                header("Location: /kelas/page/admin/data-kelas/jadwal-piket.php");
            } else {
                echo "Error: Data tidak berhasil diperbarui";
            }
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-6 pro-set-area">
                <form action="" method="post">
                    <div class="pro-form-area">
                        <p class="pro-set-head">NAMA 1 :</p>
                        <select class="form-select" name="nama_1">
                            <option selected>
                                <?php echo $bagian["nama_1"]; ?>
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
                        <p class="pro-set-head">NAMA 2 :</p>
                        <select class="form-select" name="nama_2">
                            <option selected>
                                <?php echo $bagian["nama_2"]; ?>
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
                        <p class="pro-set-head">NAMA 3 :</p>
                        <select class="form-select" name="nama_3">
                            <option selected>
                                <?php echo $bagian["nama_3"]; ?>
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
                        <p class="pro-set-head">NAMA 4 :</p>
                        <select class="form-select" name="nama_4">
                            <option selected>
                                <?php echo $bagian["nama_4"]; ?>
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
                        <p class="pro-set-head">NAMA 5 :</p>
                        <select class="form-select" name="nama_5">
                            <option selected>
                                <?php echo $bagian["nama_5"]; ?>
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
                        <p class="pro-set-head">NAMA 6 :</p>
                        <select class="form-select" name="nama_6">
                            <option selected>
                                <?php echo $bagian["nama_6"]; ?>
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
                        <p class="pro-set-head">NAMA 7 :</p>
                        <select class="form-select" name="nama_7">
                            <option selected>
                                <?php echo $bagian["nama_7"]; ?>
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
                        <p class="pro-set-head">NAMA 8 :</p>
                        <select class="form-select" name="nama_8">
                            <option selected>
                                <?php echo $bagian["nama_8"]; ?>
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
                    <div class="pro-set-konfirm d-flex justify-content-center">
                        <button type="submit" class="pro-set-konfirm-simpan" onclick="return confirm('Udah selesai di ubah?')">Simpan</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/data-kelas/jadwal-piket.php" onclick="return confirm('Ga jadi di ubah nih?')">Batal</a>
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