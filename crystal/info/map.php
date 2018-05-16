<?php
require("../config.php");


function parseToXML($htmlStr)
{
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  return $xmlStr;
}

// Opens a connection to a MySQL server
$connection=mysqli_connect ('localhost', $dbuser, $dbpass,$dbname);
if (!$connection) {
  die('Not connected : ' . mysqli_connect_error());
}else{
echo "";
}
// Select all the rows in the markers table
if(!isset($_GET["id"])){
  $query = "SELECT * FROM data_lokasi_tpu";
}else{
  $query = "SELECT * FROM data_lokasi_tpu where ID_TPU = ".$_GET["id"] ;
}

$sql = mysqli_query ($connection, $query);
$result = mysqli_query($connection, $query);
$data = array();
while ($row = mysqli_fetch_assoc ($sql)) {
  array_push($data, $row);
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
  // Add to XML document node
echo '<marker ';
echo 'name="' . parseToXML($row['nama_lokasi']) . '" ';
echo 'address="' . parseToXML($row['alamat_lokasi']) . '" ';
echo 'harga_sewa="' . parseToXML('Rp '. number_format($row['harga_sewa'],0,',','.')) . '" ';
echo 'jumlah_makam="' . parseToXML(number_format($row['jumlah_makam'],0,',','.')) . '" ';
echo 'luas_lahan="' . parseToXML(number_format($row['luas_lahan'],0,',','.').' m2') . '" ';

echo 'lat="' . $row['latitude'] . '" ';
echo 'lng="' . $row['longitude'] . '" ';
echo '/>';


// End XML file

}
echo '</markers>';