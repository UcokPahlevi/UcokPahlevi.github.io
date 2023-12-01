<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/index.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <p class="navbar-brand" href="/PPLG/index.php">XI PPLG A</p>
        </div>
    </nav>

    <div class="login">
        <div class="row justify-content-center">
            <form class="log-form-area col-12 col-sm-10 col-md-8 col-lg-4" action="/kelas/proses/masuk.php"
                method="post">
                <div class="text-center">
                    <p class="log-title">MASUK DENGAN AKUN ADMIN</p>
                    <p class="log-text">Bukan admin? <a class="log-link" href="/kelas/">klik
                            disini</a></p>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username"
                        required name="username" id="username" autofocus autocomplete="off">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password"
                        required name="password" id="password">
                </div>
                <?php
                session_start();

                if (isset($_SESSION['error'])) {
                    echo '<p class="log-text text-danger text-center mt-0 mb-0">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']);
                }
                ?>
                <div class="log-btn-control text-center">
                    <button class="log-btn">MASUK</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>