<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Ubah Detail Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/edit-biodata-siswa.css">
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
            <p class="pro-title">UBAH BIODATA SISWA</p>
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <p class="pro-sub-title">Masukan data - data baru untuk mengubah data yang sudah ada / data yang belum di masukan, jangan lupa untuk menyimpan perubahan setelah selesai.</p>
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
                    header("Location: /kelas/page/pengaturan/edit-biodata-siswa.php");
                    return false;
                }

                $ekstensiValid = ['jpg', 'jpeg', 'png'];
                $ekstensi = explode('.', $namaGambar);
                $ekstensi = strtolower(end($ekstensi));
                if (!in_array($ekstensi, $ekstensiValid)) {
                    $_SESSION['error'] = "Hanya menerima file jpg, jpeg & png!";
                    header("Location: /kelas/page/pengaturan/edit-biodata-siswa.php");
                    return false;
                }

                if ($ukuranGambar > 2000000) {
                    $_SESSION['error'] = "Ukuran gambar terlalu besar!";
                    header("Location: /kelas/page/pengaturan/edit-biodata-siswa.php");
                    return false;
                }

                $namaGambarBaru = uniqid();
                $namaGambarBaru .= '.';
                $namaGambarBaru .= $ekstensi;

                move_uploaded_file($tmpName, '../../../assets/images/foto-siswa/' . $namaGambarBaru);
                return $namaGambarBaru;
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $idQuery = "SELECT nis, foto, nama, jenis_kelamin_bs, ttl, alamat, agama, hobi, cita_cita, email, no_telp
                FROM data_siswa WHERE nis = $id";
                $result = $koneksi->query($idQuery);

                if ($result->num_rows == 1) {
                    $bagian = $result->fetch_assoc();
                    $foto = $bagian['foto'];
                    $nama = $bagian['nama'];
                    $jenis_kelamin_bs = $bagian['jenis_kelamin_bs'];
                    $ttl = $bagian['ttl'];
                    $alamat = $bagian['alamat'];
                    $agama = $bagian['agama'];
                    $hobi = $bagian['hobi'];
                    $cita_cita = $bagian['cita_cita'];
                    $email = $bagian['email'];
                    $no_telp = $bagian['no_telp'];
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
                $newJenis = $_POST['jenis_kelamin_bs'];
                $newTtl = $_POST['ttl'];
                $newAlamat = $_POST['alamat'];
                $newAgama = $_POST['agama'];
                $newHobi = $_POST['hobi'];
                $newCita = $_POST['cita_cita'];
                $newEmail = $_POST['email'];
                $newNo = $_POST['no_telp'];

                $sql_update = "UPDATE data_siswa SET
                        foto = '$newGambar', jenis_kelamin_bs = '$newJenis', ttl = '$newTtl',
                        alamat = '$newAlamat', agama = '$newAgama', hobi = '$newHobi',
                        cita_cita = '$newCita', email = '$newEmail', no_telp = '$newNo'
                        WHERE nis = $id";
                if ($koneksi->query($sql_update) === TRUE) {
                    $_SESSION['alert_berhasil'] = "";
                    header("Location: /kelas/page/admin/data-kelas/biodata-siswa.php");
                } else {
                    echo "Error: Data tidak berhasil diperbarui";
                }
            }
            ?>
            <form class="col-lg-6 pro-set-area" action="" method="post" enctype="multipart/form-data">
                <div class="row pro-set-up-area justify-content-center">
                    <div class="col-lg-6 text-center">
                        <p class="pro-set-title">FOTO SISWA</p>
                        <img class="img-fluid" src="/kelas/assets/images/foto-siswa/<?php echo $bagian["foto"]; ?>" alt="">
                        <p class="pro-set-title">GANTI FOTO SISWA :</p>
                        <p class="pro-set-sub-title">Ekstensi harus berupa ( jpg / jpeg / png )</p>
                        <div>
                            <input type="hidden" name="gambarLama" value="<?php echo $bagian["foto"]; ?>">
                            <input type="file" class="form-control" name="gambar" id="gambar">
                        </div>
                        <?php
                            if (isset($_SESSION['error'])) {
                                echo '<p class="caro-error text-center">' . $_SESSION['error'] . '</p>';
                                unset($_SESSION['error']);
                            }
                            ?>
                    </div>
                </div>
                <div class="row pro-set-down-area">
                    <div class="pro-input-area">
                        <p class="pro-set-title-2">NAMA :</p>
                        <p class="pro-set-sub-title-2">( NAMA ) diambil dari data siswa!</p>
                        <input type="text" class="form-control" name="nama" id="nama" disabled required
                            autocomplete="off" placeholder="<?php echo $bagian["nama"]; ?>">
                    </div>
                    <div class="pro-input-area">
                        <p class="pro-set-title-2">NIS :</p>
                        <p class="pro-set-sub-title-2">( NIS ) diambil dari data siswa!</p>
                        <input type="text" class="form-control" name="nis" id="nis" disabled required
                            autocomplete="off" placeholder="<?php echo $bagian["nis"]; ?>">
                    </div>
                    <div class="pro-input-area">
                        <p class="pro-set-title-2">JENIS KELAMIN :</p>
                        <p class="pro-set-sub-title-2">Perempuan / Laki - laki</p>
                        <input type="text" class="form-control" name="jenis_kelamin_bs" id="jenis_kelamin_bs" required
                            autocomplete="off" value="<?php echo $bagian["jenis_kelamin_bs"]; ?>">
                    </div>
                    <div class="pro-input-area">
                        <p class="pro-set-title-2">TEMPAT TANGGAL LAHIR :</p>
                        <p class="pro-set-sub-title-2">Tanggal / Bulan / Tahun</p>
                        <input type="date" class="form-control" name="ttl" id="ttl" required autocomplete="off" value="<?php echo $bagian["ttl"]; ?>">
                    </div>
                    <div class="pro-input-area">
                        <p class="pro-set-title-2">ALAMAT :</p>
                        <p class="pro-set-sub-title-2">Jalan / No / Rt Rw / Desa / Kecamatan / Kabupaten</p>
                        <textarea type="text" class="form-control" name="alamat" id="alamat" required autocomplete="off"
                            rows="3"><?php echo $bagian["alamat"]; ?></textarea>
                    </div>
                    <div class="pro-input-area">
                        <p class="pro-set-title-2">AGAMA :</p>
                        <p class="pro-set-sub-title-2">Islam / Kristen Protestan / Katolik / Hindu / Buddha / Konghucu
                        </p>
                        <input type="text" class="form-control" name="agama" id="agama" required autocomplete="off" value="<?php echo $bagian["agama"]; ?>">
                    </div>
                    <div class="pro-input-area">
                        <p class="pro-set-title-2">HOBI :</p>
                        <p class="pro-set-sub-title-2">Bebas, tidak lebih dari 1</p>
                        <input type="text" class="form-control" name="hobi" id="hobi" required autocomplete="off" value="<?php echo $bagian["hobi"]; ?>">
                    </div>
                    <div class="pro-input-area">
                        <p class="pro-set-title-2">CITA - CITA :</p>
                        <p class="pro-set-sub-title-2">Bebas, tidak lebih dari 1</p>
                        <input type="text" class="form-control" name="cita_cita" id="cita_cita" required
                            autocomplete="off" value="<?php echo $bagian["cita_cita"]; ?>">
                    </div>
                    <div class="pro-input-area">
                        <p class="pro-set-title-2">EMAIL :</p>
                        <p class="pro-set-sub-title-2">Alamat email aktif</p>
                        <input type="email" class="form-control" name="email" id="email" required autocomplete="off" value="<?php echo $bagian["email"]; ?>">
                    </div>
                    <div class="pro-input-area">
                        <p class="pro-set-title-2">NOMOR TELEPON :</p>
                        <p class="pro-set-sub-title-2">Nomor telepon aktif</p>
                        <input type="telp" class="form-control" name="no_telp" id="no_telp" required autocomplete="off" value="<?php echo $bagian["no_telp"]; ?>">
                    </div>
                    <div class="pro-set-konfirm d-flex justify-content-center">
                        <button type="submit" class="pro-set-konfirm-simpan" onclick="return confirm('Udah selesai di ubah?')">Simpan</button>
                        <a class="pro-set-konfirm-batal" href="/kelas/page/admin/data-kelas/biodata-siswa.php" onclick="return confirm('Ga jadi di ubah nih?')">Batal</a>
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