<div class="container px-5">
    <h2 class="fw-bold mb-3">Struk Tiket</h2>
    <div class="card mb-5">
        <div class="card-header">
            Tiket
        </div>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Berhasil melakukan pemesanan tiket!</h4>
            <p>Berikut adalah data-data anda saat melakukan pemesanan tiket. Terimakasih :)</p>
        </div>
        <div class="card-body">
            <?php
            // melakukan query untuk menampilkan data terakhir yang diinputkan pada tabel pesan_tiket dengan tabel kelas_bus menggunakan INNER JOIN
            $query = mysqli_query($con, "SELECT pesan_tiket.*,kelas_bus.* FROM pesan_tiket INNER JOIN kelas_bus ON kelas_bus.id_bus = pesan_tiket.id_bus ORDER BY id_tiket desc LIMIT 1");
            while ($rw = mysqli_fetch_array($query)) {
            ?>
                <div class="container ">
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Nama Pemesan</h5>
                                <p>:</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="fw-light"><?= $rw['nama'] ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Nomor Identitas</h5>
                                <p>:</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="fw-light"><?= $rw['ktp'] ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">No. Hp</h5>
                                <p>:</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="fw-light"><?= $rw['telp'] ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Kelas Penumpang</h5>
                                <p>:</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="fw-light"><?= $rw['nama_kelas'] ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Jumlah Penumpang</h5>
                                <p>:</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="fw-light"><?= $rw['jumlah_penumpang'] ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Jumlah Penumpang Lansia</h5>
                                <p>:</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="fw-light"><?= $rw['jumlah_lansia'] ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Harga Tiket</h5>
                                <p>:</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="fw-light"><?= $rw['harga_tiket'] ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Total Bayar</h5>
                                <p>:</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <span class="fw-light"><?= $rw['total_bayar'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-header fw-bold text-light bg-primary">
                        Kelas - <?php echo $rw['nama_kelas'] ?>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-evenly ">
                            <div class="card" style="width: 18rem;">
                                <div class="card-header text-center fw-bold">Tampilan Bus</div>
                                <img src="./assets/bus/<?= $rw['gambar_bus'] ?>" class="card-img-top" alt="...">

                            </div>
                            <div class="card" style="width: 18rem;">
                                <div class="card-header text-center fw-bold">Interior Bus</div>
                                <img src="./assets/bus/<?= $rw['gambar_kabin'] ?>" class="card-img-top" alt="...">

                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</div>