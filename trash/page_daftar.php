<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A - Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/user/daftar.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <p class="navbar-brand" href="/PPLG/index.php">XI PPLG A</p>
        </div>
    </nav>

    <div class="daftar">
        <div class="row justify-content-center">
            <form class="df-form-area col-12 col-sm-10 col-md-8 col-lg-4" action="/kelas/proses/daftar.php" method="post">
                <div class="text-center ">
                    <p class="df-title">DAFTAR AKUN BARU</p>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama :</label>
                    <input type="text" class="form-control" placeholder="Nama lengkap" required name="nama" id="nama">
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal lahir :</label>
                    <input type="date" class="form-control" required name="tanggal_lahir" id="tanggal_lahir">
                </div>
                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor telepon :</label>
                    <input type="tel" class="form-control" placeholder="+62" required name="nomor_telepon"
                        id="nomor_telepon" pattern="[0-9]{11,}" title="Pastikan nomor yang anda masukan sudah benar.">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" placeholder="@gmail.com" required name="email" id="email">
                </div>
                <hr class="df-line">
                <div class="mb-3">
                    <label for="username" class="form-label">Username :</label>
                    <input type="text" class="form-control" placeholder="Username akun" required name="username"
                        id="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password :</label>
                    <input type="password" class="form-control" placeholder="Minimal 8 karakter dan 1 huruf kapital"
                        required name="password" id="password" pattern="^(?=.*[A-Z]).{8,}$"
                        title="Minimal 8 karakter dan 1 huruf kapital.">
                </div>
                <div class="df-btn-control text-center">
                    <button class="df-btn">DAFTAR</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>