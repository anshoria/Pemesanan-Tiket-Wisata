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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <nav class="navbar navbar-expand bg-dark">
        <div class="container">
            <a href="index.php" style="text-decoration: none;">
                <h2 style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; color:white; margin-top: 15px">
                    Pemesanan Tiket Wisata</h2>
            </a>
            <ul class="navbar-nav ms-auto">
                <li style="margin-right: 20px; margin-top: 15px;">
                    <a href="index.php" style="text-decoration: none; color:white; ">
                        <h5>Tempat Wisata</h5>
                    </a>
                </li>
                <li style="margin-top: 15px;">
                    <a href="" style="text-decoration: none; color:white;">
                        <h5 style="color: rgb(34,193,195);">Daftar Pesan Tiket</h5>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
    <section>
        <div class="container">
            <h2 class="mt-5 text-center">Daftar Pemesanan Tiket</h2>
            <table class="table table-stripped" id="tabeltiket">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">No Identitas</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Tempat Wisata</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $tiket = query("SELECT * FROM pesantiket");
                    foreach ($tiket as $row) :
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row["nama"]; ?></td>
                            <td><?php echo $row["nomoridentitas"]; ?></td>
                            <td><?php echo $row["nohp"]; ?></td>
                            <td><?php echo $row["tempatwisata"]; ?></td>
                            <td><?php echo $row["tanggal"]; ?></td>
                            <td><?php echo $row["total"]; ?></td>
                            <td>
                                <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm text-white">detail</a>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm text-white">edit</a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ini?')">hapus</a>
                            </td>
                        </tr>
                    <?php
                    endforeach; ?>
                </tbody>
            </table>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function tampilkanModal(namaWisata, hargaTiket) {
            document.getElementById("namaWisata").value = namaWisata;
            document.getElementById("harga").value = "Rp " + hargaTiket.toLocaleString();

        }

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