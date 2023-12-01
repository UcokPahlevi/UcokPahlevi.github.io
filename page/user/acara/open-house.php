<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A - Open House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/user/acara/open-house9.css">
</head>

<body>
    <?php
    session_start();
    ?>
    <div class="d-flex">
        <div class="open-house">
            <div class="oh-area justify-content-center">
                <div class="oh-title text-center">
                    <p class="oh-head">DAFTAR PENGUNJUNG</p>
                    <p class="oh-text">Isi daftar pengunjung dulu yaww sebelum masuk!</p>
                </div>
                <div class="row justify-content-center mt-0 mb-0">
                    <div class="col-lg-12">
                        <?php if (isset($_SESSION['alert-berhasil'])) { ?>
                            <div class="alert dt-alert alert-dimsmissible fade show d-flex justify-content-between"
                                role="alert">
                                <p class="dt-alert-text">
                                    <img class="dt-alert-icon" src="/kelas/assets/icon/button/berhasil.png" alt="">
                                    Data berhasil di kirimkan!
                                </p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php unset($_SESSION['alert-berhasil']);
                        } ?>
                    </div>
                </div>
                <form action="../../../proses/user/insert-open-house.php" method="post">
                    <div class="oh-form-area">
                        <label for="nama" class="form-label">NAMA :</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama kamu siapa nich"
                            autocomplete="off" required>
                    </div>
                    <div class="oh-form-area">
                        <label for="kelas" class="form-label">KELAS :</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Dari kelas apa"
                            autocomplete="off" required>
                    </div>
                    <div class="oh-btn-control text-center">
                        <button class="oh-btn">KIRIM</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="open-house-2">
            <div class="pengunjung text-center">
                <p class="oh-head" id="tempatText"></p>
            </div>
        </div>
    </div>

    <script src="/kelas/js/open-house.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>