<form method="POST">
<h2>Tambah Masakan</h2><hr>
	<table>
		<tr>
			<td>Nama Masakan :</td>
			<td><input type="text" name="nama_masakan"></td>
		</tr>
		<tr>
			<td>Harga Masakan:</td>
			<td><input type="text" name="harga"></td>
		</tr>
		<tr>
			<td>Status Masakan:</td>
			<td><select name="status_masakan"> <option>habis</option><option>ada</option></select></td>
		</tr>
	</table>
	<br>
<input type="submit" value="Tambahkan" name="submit">
<br><br>
<a href="?page=masakan" target="_self">Kembali &raquo;</a>
<?php
include 'koneksi.php';
// var_dump($_POST);
if (isset($_POST['submit'])) {
	try{
		$cek_id = $koneksi->query("SELECT * FROM masakan ORDER BY id_masakan DESC");
		$hasil = $cek_id->fetch_assoc();
		$id_masakan	= $hasil['id_masakan'] + 1;
		$nama_masakan 	= '200000'.($_POST['nama_masakan'] + 1);
		$harga 			= $_POST['harga'];
		$status_masakan 	= $_POST['status_masakan'];

		$query_simpan = $koneksi->prepare("INSERT INTO masakan (id_masakan, nama_masakan, harga, status_masakan) VALUES (?,?,?,?)");
		$query_simpan->bind_param('ssss', $id_masakan, $nama_masakan, $harga, $status_masakan);
		$query_simpan->execute();
		$query_simpan->close();
		print "<script>alert('Berhasil menambah masakan')
		window.location = '?page=masakan';
		</script>";
	}catch(Exception $e){
		echo $e->getMessage();
	}
}
?>