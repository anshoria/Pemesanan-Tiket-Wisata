<?php
include "config.php";

$id = $_GET["id"];
$pesantiket = query("SELECT * FROM pesantiket WHERE id = $id");
$p = $pesantiket[0];

if (isset($_POST["ubah"])) {
    // cek keberhasilan query
    if (ubah($_POST) > 0) {
        echo "<script>
				alert('data berhasil diubah');
				document.location.href = 'daftarpesantiket.php';
			  </script>";
    } else {
        echo "<script>
				alert('data gagal diubah!');
				document.location.href = 'daftarpesantiket.php';
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <nav class="navbar navbar-expand bg-dark">
        <div class="container">
            <a href="index.php" style="text-decoration: none;">
                <h2 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color:rgb(34,193,195); margin-top: 15px">
                    Pemesanan Tiket Wisata</h2>
            </a>
            <ul class="navbar-nav ms-auto">
                <li style="margin-right: 20px; margin-top: 15px;">
                    <a href="tempatwisata.php" style="text-decoration: none; color:white; ">
                        <h5>Tempat Wisata</h5>
                    </a>
                </li>
                <li style="margin-top: 15px;">
                    <a href="" style="text-decoration: none; color:white;">
                        <h5>Daftar Pesan Tiket</h5>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
    <section>
        <form action="" method="post">
            <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="mt-2">Edit Pemesanan Tiket</h2>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?php echo $p["id"]; ?>">
                        <div class="mb-3">
                            <label for="inputNamaLengkap" class="form-label">Nama Lengkap</label>
                            <input value="<?php echo $p["nama"]; ?>" type="text" class="form-control" id="inputNamaLengkap" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputNomorIdentitas" class="form-label">Nomor Identitas</label>
                            <input value="<?php echo $p["nomoridentitas"]; ?>" type="number" class="form-control" id="inputNomorIdentitas" name="nomoridentitas" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputNoHP" class="form-label">No. HP</label>
                            <input value="<?php echo $p["nohp"]; ?>" type="number" class="form-control" id="inputNoHP" name="nohp" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputTempatWisata" class="form-label">Tempat Wisata</label>
                            <input value="<?php echo $p["tempatwisata"]; ?>" type="text" class="form-control" id="namaWisata" name="tempatwisata" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="inputTanggalKunjungan" class="form-label">Tanggal Kunjungan</label>
                            <input value="<?php echo $p["tanggal"]; ?>" type="date" class="form-control" id="inputTanggalKunjungan" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPengunjungDewasa" class="form-label">Pengunjung Dewasa</label>
                            <input value="<?php echo $p["dewasa"]; ?>" type="number" class="form-control" id="jumlahDewasa" name="dewasa" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPengunjungAnak" class="form-label" style="margin-bottom: 0px;">Pengunjung Anak-Anak</label>
                            <div>
                                <em>*Usia di bawah 12 tahun</em>
                            </div>
                            <input value="<?php echo $p["anakanak"]; ?>" type="number" class="form-control" id="jumlahAnak" name="anakanak" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputHargaTiket" class="form-label">Harga Tiket</label>
                            <input value="<?php echo $p["hargatiket"]; ?>" type="text" class="form-control" id="harga" name="harga" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="inputTotalBayar" class="form-label">Total Bayar</label>
                            <input value="<?php echo $p["total"]; ?>" type="text" class="form-control" id="totalHarga" name="total" readonly>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="hitungTotalHarga()">Hitung Total Bayar</button>
                        <button type="submit" name="ubah" class="btn btn-success">Simpan</button>
                        <a type="button" class="btn btn-primary" href="daftarpesantiket.php">Tutup</a>
                    </div>

                </div>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function hitungTotalHarga() {
            const hargaTiket = parseInt(document.getElementById("harga").value.replace("Rp ", "").replace(",", ""));
            const jumlahDewasa = parseInt(document.getElementById("jumlahDewasa").value);
            const jumlahAnak = parseInt(document.getElementById("jumlahAnak").value);
            const totalHarga = (hargaTiket * jumlahDewasa) + (hargaTiket * 0.5 * jumlahAnak);
            document.getElementById("totalHarga").value = "Rp " + totalHarga.toLocaleString();
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#tabeltiket').DataTable();
        });
    </script>


</body>

</html>