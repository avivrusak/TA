<?php
include 'config.php';
// menyimpan data kedalam variabel
$nama_ahli_waris           	= $_POST['nama_ahli_waris'];
$alamat           		  	= $_POST['alamat'];
$no_telp        			= $_POST['no_telp'];
$jenis_kelamin 	 			= $_POST['jenis_kelamin'];

// query SQL untuk insert data
$query="INSERT INTO data_ahli_waris SET nama_ahli_waris='$nama_ahli_waris',alamat='$alamat',no_telp='$no_telp', jenis_kelamin='$jenis_kelamin'";
mysqli_query($conn, $query);
// mengalihkan ke halaman index.php
header("location:/tes/crystal/index.php");
?>