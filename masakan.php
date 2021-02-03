<h1><b>Daftar Masakan</b></h1>
<hr>

<table width="700" border="0" cellpadding="2" cellspacing="1" >

  <tr>
    <td colspan="2"><a href="?page=masakan_tambah" target="_self"><img src="images/add.png">Tambah Masakan</a></td>
  </tr>
 
  <tr>
    <td colspan="2"><table class="daftar_tabel" width="100%" border="0" cellspacing="1" cellpadding="2">
      <tr>
        <th><b>Id Masakan</b></th>
		<th><b>Nama Masakan</b></th>
        <th><b>Harga</b></th>
        <th><b>Status</b> </th>
		<th><b>Hapus</b> </th>

      </tr>
	  </td>
      <?php
	$masakanSql = "SELECT * from masakan";
	$barangQry = mysqli_query($koneksi, $masakanSql)  or die ("Query barang salah : ".mysql_error());
	$nomor  = 0; 
	 foreach($barangQry as $masakanRow) {
	$nomor++;
	$Kode = $masakanRow['id_masakan'];
	?>
      <tr>
        <td><?php echo $Kode; ?></td>
		<td><?php echo $masakanRow['nama_masakan']; ?></td>
        <td><?php echo $masakanRow['harga']; ?></td>
		<td><?php 
            if ($masakanRow['status_masakan']=='ada') {
                echo "<p style='color:green'><b>Ada</b></p>";
            } else {
                echo "<p style='color:red'><b>Habis</b></p>";
            }

     ?></td>
		 <td align="center"><a href="?page=masakan_hapus&amp;Kode=<?php echo $Kode ?>" target="_self" alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><img src="images/delete.png"></a>
      <a href="?page=masakan_edit&amp;kode=<?php echo $Kode ?>" target="_self" alt="Edit Data" ><img src="images/edit.png"></a></td>
		   </tr>
      <?php } ?>
    </table></td>
  </tr>
  <tr>

	</td>
  </tr>
</table>
