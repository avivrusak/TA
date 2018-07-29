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

    <div class="container-fluid">

        <div class="page-header">
            <h1 style="
            text-align: center;
            ">Sistem Rekomendasi</h1>
        </div>

        <!-- Contact with Map - START -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="well well-sm">
                        <form class="form-horizontal" method="post">
                            <fieldset>
                                <legend class="text-center header">Hasil Rekomendasi</legend>
                                <div class="form-group col-md-12"> 
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Lokasi</th>
                                            <th>Jumlah Makam</th>
                                            <th>Luas Lahan</th>
                                            <th>Jarak</th>
                                            <th>AHP</th>
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
              lat: -7.276169,
              lng: 112.793825
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('You are here!');
            infoWindow.open(map);
            map.setCenter(pos);

            var tableHtml = "";
            var location = [];
            var sumLuas = 0, sumJarak = 0, sumHarga = 0;
            var weightLuas = 0.633, weightJarak = 0.261, weightHarga = 0.106; //bobot
            var jarak = [];
            var result = [];
            var dataMakam = [];
            var index = 0;

            <?php foreach ($data as $makam) : ?>
              var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(pos['lat'], pos['lng']), new google.maps.LatLng(<?= $makam['latitude'] ?>, <?= $makam['longitude'] ?>));

              if(distance >= <?=$jarak[0]?> && distance <= <?=$jarak[1]?>) {
                dataMakam[index] = [];
                dataMakam[index]['id'] = <?= $makam['ID_TPU'] ?>;
                dataMakam[index]['nama_lokasi'] = "<?= $makam['nama_lokasi'] ?>";
                dataMakam[index]['luas_lahan'] = <?= $makam['luas_lahan'] ?>;
                dataMakam[index]['harga_sewa'] = <?= $makam['harga_sewa'] ?>;
                dataMakam[index]['jarak'] = distance;
                dataMakam[index]['jumlah_makam'] = <?=$makam['jumlah_makam']?>;
                dataMakam[index]['lat'] = <?= $makam['latitude'] ?>;
                dataMakam[index]['lng'] = <?= $makam['longitude'] ?>;
                
                sumLuas += dataMakam[index]['luas_lahan'];
                sumJarak += distance;
                sumHarga += dataMakam[index]['harga_sewa'];

                index++;
              }
            <?php endforeach; ?>
            
            console.log('=====PERHITUNGAN AHP=====');
            for (var i = 0; i < dataMakam.length; i++) {
              console.log(dataMakam[i]['nama_lokasi'] + ' = ' + '(' + dataMakam[i]['luas_lahan'] + '[luas]/' + sumLuas + '[sumLuas]) * ' + weightLuas + '[weightLuas] + (' + dataMakam[i]['jarak'] + '[jarak]/' + sumJarak + '[sumJarak])*' + weightJarak + '[weightJarak] + (' + dataMakam[i]['harga_sewa'] + '[harga_sewa]/' + sumHarga + '[sumHarga])*' + weightHarga + '[weightHarga]');
              console.log('= ' + ((dataMakam[i]['luas_lahan']/sumLuas)*weightLuas) + ' + ' + ((dataMakam[i]['jarak']/sumJarak)*weightJarak) + ' + ' + ((dataMakam[i]['harga_sewa']/sumHarga)*weightHarga));
              dataMakam[i]['ahp'] = ((dataMakam[i]['luas_lahan']/sumLuas)*weightLuas) + ((dataMakam[i]['jarak']/sumJarak)*weightJarak) + ((dataMakam[i]['harga_sewa']/sumHarga)*weightHarga);
              console.log('= ' + dataMakam[i]['ahp']);
            }
            
            for (var i = 0; i < dataMakam.length - 1; i++) {
              for (var j = i + 1; j < dataMakam.length; j++) {
                if (dataMakam[i]['ahp'] < dataMakam[j]['ahp']) {
                  var temp = dataMakam[i];
                  dataMakam[i] = dataMakam[j];
                  dataMakam[j] = temp;
                }
              }
            }

            var infowindow = new google.maps.InfoWindow();
            var marker;
            var locations = [];
            for (var i = 0; i < dataMakam.length; i++) {
              locations[i] = [dataMakam[i]['nama_lokasi'], dataMakam[i]['lat'], dataMakam[i]['lng'], i];

              //add marker
              marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                title: locations[i][0]
              });

              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  infowindow.setContent(locations[i][0]);
                  infowindow.open(map, marker);
                  map.setCenter(new google.maps.LatLng(locations[i][1], locations[i][2]));
                }
              })(marker, i));

              tableHtml += "<tr>"
                +"<td>" + (i+1) + "</td>"
                +"<td>" + dataMakam[i]['nama_lokasi'] + "</td>"
                +"<td>" + dataMakam[i]['jumlah_makam'] + "</td>"
                +"<td>" + dataMakam[i]['luas_lahan'] + " m<sup>2</sup></td>"
                +"<td>" + Math.round(dataMakam[i]['jarak']/1000) + " km</td>"
                +"<td>" + Math.round(dataMakam[i]['ahp'] * 1000) / 1000 +"</td>"
                +"<td><a href='../go-married/index.php?id="+dataMakam[i]['id']+"' class='btn btn-success btn-xs'>Pesan</a></td>"
                +"</tr>";
            }

            console.log('urutan hasil AHP');
            console.log(dataMakam);

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