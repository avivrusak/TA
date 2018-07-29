<?php 
//var_dump($_POST); die();
	 $connect = mysqli_connect("localhost", "root", "", "tpu");  
	 $sql = "
	 INSERT INTO
	 	data_jenazah(nama_jenazah, alamat, tempat_lahir, tanggal_lahir, jenis_kelamin, tgl_pemakaman, ID_TPU)
	 VALUES(
	 	'".$_POST["nama_jenazah"]."',
	 	'".$_POST["alamat"]."',
	 	'".$_POST["tempat_lahir"]."',
	 	'".$_POST["tanggal_lahir"]."',
	 	'".$_POST["jenis_kelamin"]."',
	 	'".date('Y-m-d')."',
	 	'".$_POST['tpu_w']."'
	 )";

	// print_r($_POST);

	if(mysqli_query($connect, $sql)){
	 	$sql2= "INSERT INTO data_ahli_waris(ID_JENAZAH,nama_ahli_waris, alamat_w, tempat_lahir_w, tanggal_lahir_w, no_telp, jenis_kelamin_w, tanggal_sewa)
	 		VALUES(
	 			(SELECT ID_JENAZAH FROM `data_jenazah` ORDER BY ID_JENAZAH DESC LIMIT 1),
			 	'".$_POST['nama_w']."',
			 	'".$_POST['alamat_w']."',
			 	'".$_POST['tempat_lahir_w']."',
			 	'".$_POST['tanggal_lahir_w']."',
			 	'".$_POST['no_telp_w']."',
			 	'".$_POST['jenis_kelamin_w']."',
			 	'".date('Y-m-d')."'
			)";
		 if (mysqli_query($connect, $sql2))	{  
		    header("Location: cetak.php");
		 } else {
		 	echo "error when insert data ahli waris. # " . mysqli_error($connect);
		 }
	} else {
	 	echo "error when insert data jenazah. # " . mysqli_error($connect);
	}
	 	
	 	
	 
	 
 ?>  