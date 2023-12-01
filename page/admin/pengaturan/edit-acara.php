<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Ubah Acara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/edit-acara.css">
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
            <p class="pro-title">UBAH ACARA</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Hanya dapat mengupload foto dengan ekstensi jpg, jpeg & png, judul maksimal 35
                        karakter dan deskripsi maksimal 185 karakter.</p>
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
                    header("Location: /kelas/page/admin/");
                    return false;
                }

                $ekstensiValid = ['jpg', 'jpeg', 'png'];
                $ekstensi = explode('.', $namaGambar);
                $ekstensi = strtolower(end($ekstensi));
                if (!in_array($ekstensi, $ekstensiValid)) {
                    $_SESSION['error'] = "Hanya menerima file jpg, jpeg & png!";
                    header("Location: /kelas/page/admin/");
                    return false;
                }

                if ($ukuranGambar > 2000000) {
                    $_SESSION['error'] = "Ukuran gambar terlalu besar!";
                    header("Location: /kelas/page/admin/");
                    return false;
                }

                $namaGambarBaru = uniqid();
                $namaGambarBaru .= '.';
                $namaGambarBaru .= $ekstensi;

                move_uploaded_file($tmpName, '../../../assets/images/acara/' . $namaGambarBaru);
                return $namaGambarBaru;
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $idQuery = "SELECT id, url, judul, deskripsi FROM acara WHERE id = $id";
                $result = $koneksi->query($idQuery);

                if ($result->num_rows == 1) {
                    $bagian = $result->fetch_assoc();
                    $url = $bagian['url'];
                    $judul = $bagian['judul'];
                    $deskripsi = $bagian['deskripsi'];
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
                $newJudul = $_POST['judul'];
                $newDeskripsi = $_POST['deskripsi'];


                $sql_update = "UPDATE acara SET
                        url = '$newGambar', judul = '$newJudul', deskripsi = '$newDeskripsi' WHERE id = $id";
                if ($koneksi->query($sql_update) === TRUE) {
                $_SESSION['alert-edit-acara'] = "";
                    header("Location: /kelas/page/admin/#notip-acara");
                } else {
                    echo "Error: Data tidak berhasil diperbarui";
                }
            }
            ?>
            <form action="" method="post" class="col-lg-8 pro-edit-area d-flex justify-content-center"
                enctype="multipart/form-data">
                <div class="pro-set-left col-lg-4 text-center">
                    <div class="pro-set-left-up">
                        <p class="pro-set-left-head">FOTO SAAT INI</p>
                        <img class="pro-set-left-img img-fluid" src="/kelas/assets/images/acara/<?php echo $bagian["url"]; ?>" alt="">
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
                <div class="pro-set-right col-lg-6">
                    <div class="pro-set-right-up">
                        <p class="pro-set-right-head">JUDUL :</p>
                        <p class="pro-set-right-sub-head">Maksimal 35 karakter</p>
                        <input type="text" class="form-control" name="judul" id="judul"
                            value="<?php echo $bagian["judul"]; ?>" required autocomplete="off">
                    </div>
                    <div class="pro-set-right-down">
                        <p class="pro-set-right-head">DESKRIPSI :</p>
                        <p class="pro-set-right-sub-head">Maksimal 185 karakter</p>
                        <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" rows="5"
                            required autocomplete="off"><?php echo $bagian["deskripsi"]; ?></textarea>
                    </div>
                    <div class="pro-set-konfirm d-flex justify-content-center">
                        <button type="submit" class="pro-set-konfirm-simpan" onclick="return confirm('Udah selesai di ubah?')">Simpan</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/index.php" onclick="return confirm('Ga jadi di ubah nih?')">Batal</a>
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