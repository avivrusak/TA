<?php

	include 'config.php';

	extract($_POST);
	// echo $noPol;
	$sql = "Select * from tb_infokb where noPol=\"$noPol\"";

	$query = mysqli_query($conn, $sql);
	// echo "$sql";
	// print_r($query);
	if($query->num_rows > 0){

		while($row=mysqli_fetch_assoc($query)){

			echo '<a style= "color:#000;padding-left: 20px;">No Polisi: '.$row['nopol'].'</a><br></br>';
			echo '<a style= "color:#000;padding-left: 20px;">Nama Pemilik: '.$row['nama_pemilik'].'</a><br></br>';
			echo '<a style= "color:#000;padding-left: 20px;">Alamat: '.$row['alamat'].'</a><br></br>';
			echo '<a style= "color:#000;padding-left: 20px;">Jenis: '.$row['jenis'].'</a><br></br>';
			echo '<a style= "color:#000;padding-left: 20px;">Golongan: '.$row['golongan'].'</a><br></br>';
			echo '<a style= "color:#000;padding-left: 20px;">Warna: '.$row['warna'].'</a><br></br>';
			echo '<a style= "color:#000;padding-left: 20px;">Merk: '.$row['merk'].'</a><br></br>';
			echo '<a style= "color:#000;padding-left: 20px;">Tipe: '.$row['tipe'].'</a><br></br>';
			echo '<a style= "color:#000;padding-left: 20px;">Tanggal Mati PKB: '.$row['tanggal_mati_pkb'].'</a><br></br>';
			echo '<a style= "color:#000;padding-left: 20px;">Tanggal Bayar Terakhir '.$row['tanggal_bayar_terakhir'].'</a><br></br>';

		}
	}else{
		echo "string";
	}


?>