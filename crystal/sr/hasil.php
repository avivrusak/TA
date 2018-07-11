<?php
require("../config.php");

$connection=mysqli_connect ('localhost', $dbuser, $dbpass,$dbname);
if (!$connection) {
  die('Not connected : ' . mysqli_connect_error());
}else{
    echo "";
}

$jarak = explode("-", $_POST['jarak']);
$luas = explode("-", $_POST['luas']);
$harga = explode("-", $_POST['harga']);

$query = "SELECT * FROM data_lokasi_tpu WHERE (luas_lahan BETWEEN $luas[0] AND $luas[1]) AND (harga_sewa BETWEEN $harga[0] AND $harga[1])";

$sql = mysqli_query ($connection, $query);
$data = array();
$filteredData = array();
$resultData = array();

while ($row = mysqli_fetch_assoc($sql)){
  array_push($data, $row);
}

//print_r($data); die();

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
</head>
<body>

    <div class="container">

        <div class="page-header">
            <h1 style="
            text-align: center;
            ">Informasi</h1>
        </div>

        <!-- Contact with Map - START -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well well-sm">
                        <form class="form-horizontal" method="post">
                            <fieldset>
                                <legend class="text-center header">Hasil Rekomendasi</legend>
                                <div class="form-group col-md-10"></div>
                                <div class="form-group col-md-10"> 
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Nama Lokasi</th>
                                  <th>Jarak</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody id="data-table"></tbody>
                      </table>
                                </div> 
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <div class="panel panel-default">
                            <div class="text-center header">Location</div>
                            <div class="panel-body text-center">

                                <div id="map" class="map">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="jquery-3.2.1.min.js"></script>
    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
            label: 'B'
        }
      };

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-7.244963, 112.750820),
          zoom: 12
        });

        var infoWindow = new google.maps.InfoWindow;
        
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            map.setCenter(pos);

            var tableHtml = "";
            var nomor = 0;
            var location;
            var sumLuas = 0, sumJarak = 0, sumHarga = 0;
            var weightLuas = 0.633, weightJarak = 0.261, weightHarga = 0.106;
            var jarak = [];

            <?php foreach ($data as $makam) : ?>
              var lat = "<?php echo $makam['latitude']; ?>";
              var lng = "<?php echo $makam['longitude']; ?>";
              var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(pos['lat'], pos['lng']), new google.maps.LatLng(lat, lng));
              
              if(distance >= <?=$jarak[0]?> && distance <= <?=$jarak[1]?>) {
                jarak[<?= $makam['ID_TPU'] ?>] = distance;

                sumLuas += <?php echo $makam['luas_lahan']; ?>;
                sumJarak += Math.round(distance/1000);
                sumHarga += <?php echo $makam['harga_sewa']; ?>;

                location = ['<?= $makam['nama_lokasi'] ?>', lat, lng, nomor];

                //add marker
                marker = new google.maps.Marker({
                  map: map,
                  position: new google.maps.LatLng(location[1], location[2])
                });
                nomor++;

                tableHtml += "<tr>"
                +"<td>"+nomor+"</td>"
                +"<td><?= $makam['nama_lokasi'] ?></td>"
                +"<td>"+Math.round(distance/1000)+" km</td>"
                +"<td><a href='#'><span class='glyphicon glyphicon-eye-open'></span></a></td>"
                +"</tr>";
              }
            <?php endforeach; ?>
            console.log("sumLuas=" + sumLuas +" | sumJarak=" + sumJarak + " | sumharga=" + sumHarga);
            $('#data-table').html(tableHtml);
          }, function() {
            //handleLocationError(true, infoWindow, map.getCenter());
          });
        }
      }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3o8Oha028VgY1If5FO2xIifKeiKqbqyo&callback=initMap&libraries=geometry">
    </script>
</div>

</body>
</html>