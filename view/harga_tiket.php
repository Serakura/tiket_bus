<div class="container px-5">

    <div class="table-responsive px-2 py-4 ">
        <h2 class="mb-3 fw-bold">List Harga Tiket Bus</h2>
        <table class="table table-bordered table-hover table-striped " id="data-table">
            <thead style="background-color: #4e73df;">
                <tr class="text-light">
                    <th scope="col">No.</th>
                    <th scope="col">Kelas Bus</th>
                    <th scope="col">Harga Tiket</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // function untuk merubah integer menjadi format rupiah
                function rupiah($angka)
                {

                    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
                    return $hasil_rupiah;
                }
                // melakukan query untuk memanggil semua data yang ada di tabel kelas_bus
                $query = "SELECT * FROM kelas_bus";

                $data = mysqli_query($con, $query);
                $nomor = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $nomor++; ?></td>
                        <td><?php echo $d['nama_kelas']; ?></td>
                        <td><?php echo rupiah($d['harga']); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</div>