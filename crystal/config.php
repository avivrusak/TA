<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'tpu';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(! $conn ) {
die('Could not connect: ' . mysqli_error($conn));
}
// echo 'Connected successfully';
// mysqli_close($conn);
?>