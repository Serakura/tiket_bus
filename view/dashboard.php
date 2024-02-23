<div class="container px-5">
    <h2 class="fw-bold mb-3">Dashboard</h2>
    <?php
    // melakukan query untuk menampilkan semua data di tabel kelas_bus
    $query = mysqli_query($con, "SELECT * FROM kelas_bus");
    while ($rw = mysqli_fetch_array($query)) {
    ?>
        <div class="card mb-5">
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