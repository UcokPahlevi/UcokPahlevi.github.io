<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Ganti Foto Galeri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/ganti-foto-galeri.css">
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
            <p class="navbar-brand" href="/PPLG/index.php">XI PPLG A</p>
        </div>
    </nav>

    <div class="proses">
        <div class="pro-title-area text-center">
            <p class="pro-title">GANTI FOTO GALERI</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Pilih foto untuk mengubah foto yang ada pada carousel galeri, jangan lupa
                        simpan perubahan agar foto yang di pilih dapat di gunakan.</p>
                </div>
            </div>
        </div>
        <div class="row pro-foto-area text-center">
            <?php
            include '../../../koneksi.php';
            $galeriQuery = "SELECT * FROM galeri";
            $result = $koneksi->query($galeriQuery);

            while ($bagian = mysqli_fetch_assoc($result)) { ?>
                <div class="col-lg-2">
                    <img class="img-fluid" src="/kelas/assets/images/galeri/<?php echo $bagian["url"]; ?>" alt="">
                    <div class="pro-btn-area">
                        <input class="pro-pilih-btn" type="button" value="Pilih Foto"
                            onclick="isiForm('<?php echo $bagian["url"]; ?>')">
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row pro-url-area justify-content-center">
            <?php
            include '../../../koneksi.php';

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $idQuery = "SELECT id, url FROM galeri_carousel WHERE id = $id";
                $result = $koneksi->query($idQuery);

                if ($result->num_rows == 1) {
                    $bagian = $result->fetch_assoc();
                    $galeriCarousel = $bagian['url'];
                } else {
                    echo "Data tidak ditemukan.";
                }
            } else {
                echo "ID tidak diberikan.";
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $newGaleriCarousel = $_POST['url'];

                $galeriUpdate = "UPDATE galeri_carousel SET
            url = '$newGaleriCarousel' WHERE id = $id";
                if ($koneksi->query($galeriUpdate) === TRUE) {
                    $_SESSION['alert-ganti-galeri'] = "";
                    echo '<script>window.location.href = "/kelas/page/admin/#notip-galeri";</script>';
                } else {
                    echo "Error: Data tidak berhasil diperbarui";
                }
            }
            ?>
            <div class="col-lg-6">
                <form method="post">
                    <input type="text" class="form-control" name="url" id="url"
                        placeholder="<?php echo $bagian["url"]; ?>" autocomplete="off">
                    <div class="pro-konfirm-area d-flex justify-content-center">
                        <button type="submit" class="pro-konfirm-simpan"
                            onclick="return confirm('Yakin foto yang itu?')">Simpan</button>
                        <a class="pro-konfirm-batal" href="/kelas/page/admin/index.php"
                            onclick="return confirm('Ga jadi di ganti nih?')">Batal</a>
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