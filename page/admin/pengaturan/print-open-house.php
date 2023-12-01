<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XI PPLG A + Print Open House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/kelas/css/proses/print-open-house.css">
</head>

<body onload= "window.print()">
    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: /kelas/");
        exit();
    }

    $username = $_SESSION['username'];
    ?>

    <div class="data">
            <p class="dt-title text-center">DATA PENGUNJUNG : OPEN HOUSE - XI PPLG A</p>
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th class="tb-head">NO</th>
                    <th class="tb-head">NAMA</th>
                    <th class="tb-head">KELAS</th>
                </tr>
            </thead>
            <?php
            include '../../../koneksi.php';
            $NO = 1;
            $tabelQuery = "SELECT * FROM open_house";
            $result = $koneksi->query($tabelQuery);

            while ($bagian = mysqli_fetch_assoc($result)) {
                ?>
                <tbody>
                    <tr class="text-center">
                        <td class="tb-body">
                            <?php echo $NO ?>
                        </td>
                        <td class="tb-body">
                            <?php echo $bagian['nama'] ?>
                        </td>
                        <td class="tb-body">
                            <?php echo $bagian['kelas'] ?>
                        </td>
                    </tr>
                </tbody>
                <?php $NO++;
            } ?>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>