<?php 
function koneksi()
{
	$conn = mysqli_connect("localhost", "root", "", "jwd") or die("koneksi gagal");
	return $conn;
}
function query($query)
{
	$conn = koneksi();

	$result = mysqli_query($conn, $query);
	$rows = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}
function pesantiket(){
    $conn = koneksi();
	$nama = ($_POST['nama']);
	$nomoridentitas = ($_POST['nomoridentitas']);
	$nohp = ($_POST['nohp']);
	$tempatwisata = ($_POST['tempatwisata']);
    $tanggal = ($_POST['tanggal']);
    $dewasa = ($_POST['dewasa']);
    $anakanak = ($_POST['anakanak']);
	$harga = ($_POST['harga']);
    $total = ($_POST['total']);


	$query = "INSERT INTO pesantiket
VALUES
('','$nama','$nomoridentitas','$nohp','$tempatwisata','$tanggal','$dewasa','$anakanak','$harga','$total')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($id){
	$conn = koneksi();

	mysqli_query($conn, "DELETE FROM pesantiket WHERE id = $id");

	return mysqli_affected_rows($conn);
}



function ubah()
{
	$conn = koneksi();
	$id = ($_GET['id']);
	$nama = ($_POST['nama']);
	$nomoridentitas = ($_POST['nomoridentitas']);
	$nohp = ($_POST['nohp']);
	$tempatwisata = ($_POST['tempatwisata']);
    $tanggal = ($_POST['tanggal']);
    $dewasa = ($_POST['dewasa']);
    $anakanak = ($_POST['anakanak']);
	$harga = ($_POST['harga']);
    $total = ($_POST['total']);


	$query = "UPDATE pesantiket SET 	
				nama = '$nama',
                nomoridentitas = '$nomoridentitas',
                nohp = '$nohp',
				tempatwisata = '$tempatwisata',
				tanggal = '$tanggal',
                dewasa = '$dewasa',
				anakanak = '$anakanak',
				hargatiket = '$harga',
				total = '$total'
			  WHERE id = $id";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
?>