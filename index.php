<?php
// memanggil file database
require './db/database.php';
$view = "";
// cek method get
if (isset($_GET['view'])) {
    $view = $_GET['view'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemesanan Tiket Bus</title>
    <!-- Menggunakan CDN CSS Library dari Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }
</style>

<body>
    <!-- Membuat Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
        <div class="container ">
            <a class="navbar-brand text-bold fst-italic" href="./index.php" style="margin-right: 50px;">
                <h1>TiketBusAja</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex fs-5">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php if ($view == "" || $view == "dashboard") {
                                                    echo "active";
                                                }  ?>" aria-current="page" href="./index.php?view=dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($view == "harga tiket") {
                                                    echo "active";
                                                }  ?>" href="./index.php?view=harga tiket">Harga Tiket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($view == "pesan tiket") {
                                                    echo "active";
                                                }  ?>" href="./index.php?view=pesan tiket">Pesan Tiket</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- semua yg ada difolder view dipangggil di sini -->
    <div class="container">
        <?php
        if ($view == "" || $view == "dashboard") {
            include './view/dashboard.php';
        } else if ($view == "harga tiket") {
            include './view/harga_tiket.php';
        } else if ($view == "pesan tiket") {
            include './view/pesan_tiket.php';
        } else if ($view == "berhasil pesan tiket") {
            include './view/berhasil_pesan.php';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>