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
                                <div class="form-group col-md-10">
                                    
                                 </div>
                                 <div class="form-group col-md-10">

                                 
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Nama Lokasi</th>
                                  <th>Luas Lahan</th>
                                  <th>Harga Sewa</th>
                                  <th>Alamat Lokasi</th>
                                  <th>Jumlah Makam</th>
                                  <th>Aksi</th>
                                      <!-- <span class="glyphicon glyphicon-eye-open"></span> -->

                              </tr>

                          </thead>


                          <tbody>
                            <?php 
                              $i=0;

                              foreach ($data as $key => $value) {?>
                              <tr>
                                  <td><?=($i+1)?></td>
                                  <td><?=$value['nama_lokasi'] ?></td>
                                  <td><?=$value['luas_lahan'] ?></td>
                                  <td><?=$value['harga_sewa'] ?></td>
                                  <td><?=$value['alamat_lokasi'] ?></td>
                                  <td><?=$value['jumlah_makam'] ?></td>
                                  <td>
                                    <a href="#">
                                      <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                              </td>
                                
                              </tr>
                              <?php
                                $i++;
                               } ?>
                          </tbody>
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

            infoWindow.setPosition(pos);
            infoWindow.setContent('Yu are here!');
            infoWindow.open(map);
            map.setCenter(pos);

            <?php foreach ($data as $makam) : ?>
              var lat = "<?php echo $makam['latitude']; ?>";
              var lng = "<?php echo $makam['longitude']; ?>";
              var distance = google.maps.geometry.spherical.computeDistanceBetween(new google.maps.LatLng(pos['lat'], pos['lng']), new google.maps.LatLng(lat, lng);
              //if(distance >= <?=$jarak[0]?> && distance <= <?=$jarak[1]?>) {
                console.log('<?=$makam?>');
              //}
              <?php ?>
            <?php endforeach; ?>
          }, function() {
            //handleLocationError(true, infoWindow, map.getCenter());
          });
        }

          // Change this depending on the name of your PHP or XML file
          /*downloadUrl('http://localhost/tes/crystal/sr/map.php', function(data) {
            var xml = data.responseXML;
            markers = xml.documentElement.getElementsByTagName('marker');
            indexMarker = 0;
            mapMarkers = new Array();
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });

              mapMarkers[indexMarker] = marker; 
              indexMarker++;
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });*/
      }

      /*function changeMarker(id){
        for(var i=0; i < mapMarkers.length; i++){
            mapMarkers[i].setMap(null);
        }
        var infoWindow = new google.maps.InfoWindow;
        mapMarkers = new Array();
        downloadUrl('http://localhost/tes/crystal/sr/map.php?id='+id, function(data) {
            var xml = data.responseXML;
            markers = xml.documentElement.getElementsByTagName('marker');
            indexMarker = 0;
            mapMarkers = new Array();
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = 'oke';//name;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });

              mapMarkers[indexMarker] = marker; 
              indexMarker++;
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });

            map.setCenter(new google.maps.LatLng(parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng'))));

            $('#hargasewa').val(markerElem.getAttribute('harga_sewa'));
            $('#luaslahan').val(markerElem.getAttribute('luas_lahan'));
            $('#jmlmakam').val(markerElem.getAttribute('jumlah_makam'));

          });
        });
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);*/
}
</script>

<script src="jquery-3.2.1.min.js"></script>

<script type="text/javascript">

   $('#makam').on('change', function() {
       changeMarker(this.value);
  })
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3o8Oha028VgY1If5FO2xIifKeiKqbqyo&callback=initMap&libraries=geometry">
        </script>





<!-- Contact with Map - END -->

</div>

</body>
</html>