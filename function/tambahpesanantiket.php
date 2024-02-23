<?php
// memanggil file yang digunakan untuk melakukan query
require '../db/database.php';
// mengambil dan menyimpan data, setelah melakukan method POST
$nama = $_POST['nama'];
$ktp = $_POST['ktp'];
$telp = $_POST['telp'];
$kelas = $_POST['kelas'];
$jadwal = $_POST['jadwal'];
$penumpang = $_POST['penumpang'];
$penumpang_lansia = $_POST['penumpang_lansia'];
$harga = $_POST['harga_form'];
$bayar = $_POST['bayar_form'];
// melakukan query untuk memasukan data kedalam database, khususnya pada tabel pesan_tiket
$query = mysqli_query($con, "INSERT INTO `pesan_tiket`(`nama`, `ktp`, `telp`, `jadwal_berangkat`, `jumlah_penumpang`, `jumlah_lansia`, `harga_tiket`, `total_bayar`, `id_bus`) 
VALUES ('$nama','$ktp','$telp','$jadwal','$penumpang','$penumpang_lansia','$harga','$bayar','$kelas')");
// jika berhasil melakukan query maka akan dialihkan ke halaman output
if ($query) {
    header("location: ../index.php?view=berhasil pesan tiket");
}
