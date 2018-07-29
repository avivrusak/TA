<?php
require("../config.php");

$connection=mysqli_connect ('localhost', $dbuser, $dbpass,$dbname);
if (!$connection) {
  die('Not connected : ' . mysqli_connect_error());
}else{
    echo "";
}


$query = "SELECT * FROM data_lokasi_tpu ";
$sql = mysqli_query ($connection, $query);
$data = array();


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Information </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">

        <div class="page-header">
            <h1 style="
            text-align: center;
            ">Sistem Rekomendasi TPU</h1>
        </div>

        <!-- Contact with Map - START -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="well well-sm">
                        <form class="form-horizontal" method="post" action="hasil.php">
                            <fieldset>
                                <legend class="text-center header">Sistem Rekomendasi</legend>

                                   <div class="form-group col-md-10">                         
                                    <div class="col-md-10 col-md-offset-1">

                                    <label for="jarak">Lokasi TPU </label>
                                    <select name="jarak" id="jarak">
                                    <option value="0-5000">< 5 km</option>
                                    <option value="5001-10000">5km-10km</option>
                                    <option value="10001-15000">10km-15km</option>
                                    <option value="15001-99999999">>15km</option>
                                  </select>
                                </div>
                              </div>


                                 <div class="form-group col-md-10">
                                    <div class="col-md-10 col-md-offset-1">
                                        <label for="luas">Luas Makam</label>
                                        <select name="luas" id="luas">
                                        <option value="25000-50000">25.000 - 50.000 <i>meter<sup>2</sup></i></option>
                                        <option value="50001-1000000">50.000 - 100.000<i> meter<sup>2</sup></i></option>
                                        <option value="100001-99999999">> 100.000<i>meter<sup>2</sup></i></option>
                                      </select>
                                      </div>  
                                </div>

                                <div class="form-group col-md-10">

                                    <div class="col-md-10 col-md-offset-1">
                                      <label for="harga">Harga Sewa</label>
                                      <select name="harga" id="harga">
                                        <option value="500000-750000">Rp 500.000 - Rp 750.000</option>
                                        <option value="750001-1000000">Rp 750.000 - Rp 1.000.000</option>
                                        <option value="1000001-999999999">> Rp 1.000.000</option>
                                      </select>  

                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg" style="background-color:DodgerBlue;">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>


        

<style>
.map {
    min-width: 300px;
    min-height: 300px;
    width: 100%;
    height: 100%;
}

.header {
    background-color: #F5F5F5;
    color: #36A0FF;
    height: 70px;
    font-size: 27px;
    padding: 10px;
}
</style>

<!-- Contact with Map - END -->

</div>

</body>
</html>