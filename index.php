<?php
include "config.php";

if (isset($_POST["tambah"])) {
    // cek keberhasilan query
    if (pesantiket($_POST) > 0) {
        echo "<script>
				alert('data berhasil ditambah');
				document.location.href = 'index.php';
			  </script>";
    } else {
        echo "<script>
				alert('data gagal diinputkan!');
				document.location.href = 'index.php';
			  </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    html,
    body {
        background-image: url("bg.png");
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        font-family: 'Numans', sans-serif;
    }
</style>

<body>
    <nav class="navbar navbar-expand bg-dark">
        <div class="container">
            <a href="" style="text-decoration: none;">
                <h2 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color:white; margin-top: 15px">
                    Pemesanan Tiket Wisata</h2>
            </a>
            <ul class="navbar-nav ms-auto">
                <li style="margin-right: 20px; margin-top: 15px;">
                    <a href="tempatwisata.php" style="text-decoration: none; color: rgb(34,193,195); ">
                        <h5>Tempat Wisata</h5>
                    </a>
                </li>
                <li style="margin-top: 15px;">
                    <a href="daftarpesantiket.php" style="text-decoration: none; color:white;">
                        <h5>Daftar Pesan Tiket</h5>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
    <section>
        <div class="container">
            <h2 class="mt-5 text-center text-light">Wisata Populer di Daerah Kami</h2>
            <div class="row">
                <div class="col-xs-10 col-sm-3">
                    <div class="card" style="width: 18rem; margin-top:15px;">
                        <img src="https://mytrip123.com/wp-content/uploads/2022/04/Pantai-Parangtritis-1.jpg" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Pantai Parangtritis</h5>
                            <p class="card-text">Harga Tiket: Rp. 50.000</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah" onclick="tampilkanModal('Pantai Parangtritis', 50000)">
                                Pesan Tiket
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-10 col-sm-3">
                    <div class="card" style="width: 18rem; margin-top:15px;">
                        <img src="https://kotajogja.co.id/wp-content/uploads/2023/07/Harga-tiket-masuk-pantai-wediombo.jpg" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Pantai Wediombo</h5>
                            <p class="card-text">Harga Tiket: Rp. 45.000</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah" onclick="tampilkanModal('Pantai Wediombo', 45000)">
                                Pesan Tiket
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-10 col-sm-3">
                    <div class="card" style="width: 18rem; margin-top:15px;">
                        <img src="https://visitingjogja.jogjaprov.go.id/wp-content/uploads/2022/10/gambar-puncak-becici-foto-SiBakul-Jogja.jpg" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Puncak Becici</h5>
                            <p class="card-text">Harga Tiket: Rp. 50.000</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah" onclick="tampilkanModal('Puncak Becici', 50000)">
                                Pesan Tiket
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-10 col-sm-3">
                    <div class="card" style="width: 18rem; margin-top:15px;">
                        <img src="https://asset.kompas.com/crops/jd-jJrrEOFp-6DZy4VNFrkHI_HM=/0x0:1800x1200/750x500/data/photo/2023/09/29/6516ad5ad839e.jpg" height="200px" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bunker Kaliadem</h5>
                            <p class="card-text">Harga Tiket: Rp. 100.000</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah" onclick="tampilkanModal('Bungker Kaliadem', 100000)">
                                Pesan Tiket
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalPesanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPesanLabel">Pesan Tiket Wisata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="inputNamaLengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="inputNamaLengkap" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputNomorIdentitas" class="form-label">Nomor Identitas</label>
                            <input type="number" class="form-control" id="inputNomorIdentitas" name="nomoridentitas" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputNoHP" class="form-label">No. HP</label>
                            <input type="number" class="form-control" id="inputNoHP" name="nohp" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputTempatWisata" class="form-label">Tempat Wisata</label>
                            <input type="text" class="form-control" id="namaWisata" name="tempatwisata" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="inputTanggalKunjungan" class="form-label">Tanggal Kunjungan</label>
                            <input type="date" class="form-control" id="inputTanggalKunjungan" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPengunjungDewasa" class="form-label">Pengunjung Dewasa</label>
                            <input type="number" class="form-control" id="jumlahDewasa" name="dewasa" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPengunjungAnak" class="form-label" style="margin-bottom: 0px;">Pengunjung Anak-Anak</label>
                            <div>
                                <em>*Usia di bawah 12 tahun</em>
                            </div>
                            <input type="number" class="form-control" id="jumlahAnak" name="anakanak" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputHargaTiket" class="form-label">Harga Tiket</label>
                            <input type="text" class="form-control" id="harga" name="harga" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="inputTotalBayar" class="form-label">Total Bayar</label>
                            <input type="text" class="form-control" id="totalHarga" name="total" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="inputSetujuSyarat" class="form-label">
                                <input type="checkbox" id="inputSetujuSyarat" name="syarat" required>
                                Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat ketentuan yang telah ditetapkan.
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="hitungTotalHarga()">Hitung Total Bayar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- JavaScript Bootstrap (dan jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function tampilkanModal(namaWisata, hargaTiket) {
             // Mengisi nilai pada form input dengan data dari kartu yang terkait
             document.getElementById("namaWisata").value = namaWisata;
            document.getElementById("harga").value = "Rp " + hargaTiket.toLocaleString();
            
        }

        function hitungTotalHarga() {
            const hargaTiket = parseInt(document.getElementById("harga").value.replace("Rp ", "").replace(",", ""));
            const jumlahDewasa = parseInt(document.getElementById("jumlahDewasa").value);
            const jumlahAnak = parseInt(document.getElementById("jumlahAnak").value);
            const totalHarga = (hargaTiket * jumlahDewasa) + (hargaTiket * 0.5 * jumlahAnak); // Harga tiket anak 50% dari harga tiket dewasa
            document.getElementById("totalHarga").value = "Rp " + totalHarga.toLocaleString();
        }
    </script>


</body>

</html>