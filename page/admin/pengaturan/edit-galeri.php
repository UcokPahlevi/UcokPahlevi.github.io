<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Ubah Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/edit-galeri.css">
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
            <p class="pro-title">UBAH GALERI</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Hanya dapat mengupload foto dengan ekstensi jpg, jpeg & png, keterangan
                        maksimal 64 karakter dan tanggal di isi dengan tanggal foto diambil.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            include '../../../koneksi.php';

            function upload()
            {
                $namaGambar = $_FILES['gambar']['name'];
                $ukuranGambar = $_FILES['gambar']['size'];
                $error = $_FILES['gambar']['error'];
                $tmpName = $_FILES['gambar']['tmp_name'];

                if ($error === 4) {
                    $_SESSION['error'] = "Pilih gambar terlebih dahulu!";
                    header("Location: /kelas/page/pengaturan/edit-galeri.php");
                    return false;
                }

                $ekstensiValid = ['jpg', 'jpeg', 'png'];
                $ekstensi = explode('.', $namaGambar);
                $ekstensi = strtolower(end($ekstensi));
                if (!in_array($ekstensi, $ekstensiValid)) {
                    $_SESSION['error'] = "Hanya menerima file jpg, jpeg & png!";
                    header("Location: /kelas/page/pengaturan/edit-galeri.php");
                    return false;
                }

                if ($ukuranGambar > 2000000) {
                    $_SESSION['error'] = "Ukuran gambar terlalu besar!";
                    header("Location: /kelas/page/pengaturan/edit-galeri.php");
                    return false;
                }

                $namaGambarBaru = uniqid();
                $namaGambarBaru .= '.';
                $namaGambarBaru .= $ekstensi;

                move_uploaded_file($tmpName, '../../../assets/images/galeri/' . $namaGambarBaru);
                return $namaGambarBaru;
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $idQuery = "SELECT * FROM galeri WHERE id = $id";
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
                $gambarLama = $_POST['gambarLama'];
                if ($_FILES['gambar']['error'] === 4) {
                    $newGambar = $gambarLama;
                } else {
                    $newGambar = upload();
                }
                $newKet = $_POST['keterangan'];
                $newTgl = $_POST['tanggal'];


                $sql_update = "UPDATE galeri SET
                        url = '$newGambar', keterangan = '$newKet', tanggal = '$newTgl' WHERE id = $id";
                if ($koneksi->query($sql_update) === TRUE) {
                    $_SESSION['alert_berhasil'] = "";
                    header("Location: /kelas/page/admin/galeri.php");
                } else {
                    echo "Error: Data tidak berhasil diperbarui";
                }
            }
            ?>
            <form action="" method="post" class="col-lg-6 pro-edit-area justify-content-center"
                enctype="multipart/form-data">
                <div class="row justify-content-center">
                    <div class="pro-set-left col-lg-6 text-center">
                        <div class="pro-set-left-up">
                            <p class="pro-set-left-head">FOTO SAAT INI</p>
                            <img class="pro-set-left-img img-fluid"
                                src="/kelas/assets/images/galeri/<?php echo $bagian["url"]; ?>" alt="">
                        </div>
                        <div class="pro-set-left-down">
                            <p class="pro-set-left-head">GANTI FOTO ACARA :</p>
                            <div class="row justify-content-center text-center">
                                <div class="col-lg-12">
                                    <p class="pro-info-title">Ekstensi harus berupa ( jpg / jpeg / png )
                                    </p>
                                </div>
                            </div>
                            <div>
                                <input type="hidden" name="gambarLama" value="<?php echo $bagian["url"]; ?>">
                                <input type="file" class="form-control" name="gambar" id="gambar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="pro-set-right col-lg-8 mt-5">
                        <div class="pro-set-right-up">
                            <p class="pro-set-right-head">KETERANGAN :</p>
                            <p class="pro-set-right-sub-head">Maksimal 64 karakter</p>
                            <textarea type="text" class="form-control" name="keterangan" id="keterangan" required
                                autocomplete="off"><?php echo $bagian["keterangan"]; ?></textarea>
                        </div>
                        <div class="pro-set-right-down">
                            <p class="pro-set-right-head">TANGGAL :</p>
                            <p class="pro-set-right-sub-head">Tanggal foto diambil</p>
                            <input type="data" class="form-control" name="tanggal" id="tanggal" required
                                autocomplete="off" value="<?php echo $bagian["tanggal"]; ?>">
                        </div>
                        <div class="pro-set-konfirm d-flex justify-content-center">
                            <button type="submit" class="pro-set-konfirm-simpan" onclick="return confirm('Udah selesai di ubah?')">Simpan</button>
                            <a class="pro-set-konfirm-batal" href="/kelas/page/admin/galeri.php" onclick="return confirm('Ga jadi di ubah nih?')">Batal</a>
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

    <script src="/kelas/js/pilih-foto.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>