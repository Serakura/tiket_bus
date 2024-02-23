<div class="container px-5">
    <h2 class="fw-bold mb-3">Form Pemesanan Tiket Bus</h2>
    <div class="container border shadow p-5 mb-3">
        <form action="./function/tambahpesanantiket.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama lengkap sesuai ktp" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Nomor Identitas</label>
                <input type="number" class="form-control" id="ktp" name="ktp" placeholder="Nomor ktp" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">No. HP</label>
                <input type="number" class="form-control" id="telp" name="telp" placeholder="Nomor handphone yang bisa dihubungi" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Kelas Penumpang</label>
                <select class="form-control" name="kelas" id="kelas" onchange="harga(this.value)" required>
                    <option value="">Pilih kelas penumpang</option>
                    <?php
                    // melakukan query untuk menampilkan data id_bus dan name_kelas dari tabel kelas_bus
                    $query = mysqli_query($con, "SELECT id_bus,nama_kelas FROM kelas_bus");
                    while ($rw = mysqli_fetch_array($query)) {
                    ?>
                        <option value="<?= $rw['id_bus'] ?>"><?= $rw['nama_kelas'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Jadwal Keberangkatan</label>
                <input type="date" class="form-control" id="jadwal" name="jadwal" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Jumlah Penumpang <br> <span class="fst-italic">Bukan Lansia (Usia < 60)</span></span></label>
                <input type="number" class="form-control" id="penumpang" name="penumpang" placeholder="Jumlah penumpang" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Jumlah Penumpang Lansia <br> <span class="fst-italic">Usia 60 tahun keatas</span></span></label>
                <input type="number" class="form-control" id="penumpang_lansia" name="penumpang_lansia" placeholder="Jumlah penumpang lansia" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Harga Tiket : <span class="fst-italic" id="harga"> </span></label>
                <input type="text" class="form-control" id="harga_form" name="harga_form" placeholder="" hidden>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Total Bayar : <span class="fst-italic" id="bayar"> </span></label>
                <input type="text" class="form-control" id="bayar_form" name="bayar_form" placeholder="" hidden>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan.</label>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a class="btn btn-primary" onclick="hitung()">Hitung Total Bayar</a>
                <button type="submit" class="btn btn-primary mx-3" id="btn-pesan" disabled>Pesan Tiket</button>
                <button class="btn btn-primary" type="reset">Cancel</button>
            </div>
        </form>
    </div>
</div>
<script>
    // function untuk mengset harga tiket ketika user memilih kelas penumpang
    function harga(harga) {
        var hrg = "";
        switch (harga) {
            case "1": {
                hrg = "Rp 20.000";
            }
            break;
        case "2": {
            hrg = "Rp 50.000";
        }
        break;
        case "3": {
            hrg = "Rp 100.000";
        }
        break;
        default:
            hrg = "Rp 0";
        }
        var a = document.getElementById('harga').innerHTML = hrg;
        document.getElementById('harga_form').value = a;

    }
    // function untuk mendapatkan total bayar
    function hitung() {
        var kelas = document.getElementById('kelas').value;
        var harga = document.getElementById('harga').value;
        var biasa = document.getElementById('penumpang').value;
        var lansia = document.getElementById('penumpang_lansia').value;
        console.log(kelas);
        var hrg = 0;
        var total = 0;
        switch (kelas) {
            case "1": {
                hrg = (biasa * 20000) + (lansia * (20000 - (20000 * 0.10)));
                hrg = "Rp. " + formatRupiah(hrg);
            }
            break;
        case "2": {
            hrg = (biasa * 50000) + (lansia * (50000 - (50000 * 0.10)));
            hrg = "Rp. " + formatRupiah(hrg);
        }
        break;
        case "3": {
            hrg = (biasa * 100000) + (lansia * (100000 - (100000 * 0.10)));
            hrg = "Rp. " + formatRupiah(hrg);
        }
        break;
        default:
            hrg = "Rp 0";
        }
        var a = document.getElementById('bayar').innerHTML = hrg;
        document.getElementById('bayar_form').value = a;
        document.getElementById('btn-pesan').removeAttribute('disabled');
    }
    // function untuk membuat  integer menjadi format rupiah
    function formatRupiah(bilangan) {
        var number_string = bilangan.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return rupiah;
    }
</script>