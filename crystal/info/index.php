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
            ">Informasi</h1>
        </div>

        <!-- Contact with Map - START -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well well-sm">
                        <form class="form-horizontal" method="post">
                            <fieldset>
                                <legend class="text-center header">Informasi Pemakaman</legend>
                                <div class="form-group col-md-10">
                                    <div class="col-md-10 col-md-offset-1">

                                        <select id="makam">
                                            <?php while ($row = mysqli_fetch_assoc($sql)){

                                             ?>

                                             <option value="<?php echo $row['ID_TPU'] ?>"><?php echo $row['nama_lokasi']?></option>
                                             <?php } ?>

                                         </select>
                                         <!-- <input id="fname" name="name" type="text" placeholder="First Name" class="form-control"> -->
                                     </div>
                                 </div>
                                 <div class="form-group col-md-10">


                                    <div class="col-md-10 col-md-offset-1">
                                        <label for="luaslahan">Luas Makam</label>
                                        <input id="luaslahan" name="name" type="text" placeholder="Luas Makam" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group col-md-10">

                                    <div class="col-md-10 col-md-offset-1">
                                      <label for="hargasewa">Harga Sewa</label>
                                        <input id="hargasewa" name="name" type="text" placeholder="Harga sewa" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group col-md-10">
                                    <div class="col-md-10 col-md-offset-1">
                                        <label for="jmlmakam"> Jumlah Makam</label>
                                        <input id="jmlmakam" name="email" type="text" placeholder="Jumlah Makam" class="form-control">
                                    </div>
                                </div>





                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                    </div>
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
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-7.244963, 112.750820),
          zoom: 12
      });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/tes/crystal/info/map.php', function(data) {
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
              strong.textContent = name
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
        });
      }

      function changeMarker(id){
        for(var i=0; i < mapMarkers.length; i++){
            mapMarkers[i].setMap(null);
        }
         var infoWindow = new google.maps.InfoWindow;
        mapMarkers = new Array();
        downloadUrl('http://localhost/tes/crystal/info/map.php?id='+id, function(data) {
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
              strong.textContent = name
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
    request.send(null);
}

function doNothing() {}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3o8Oha028VgY1If5FO2xIifKeiKqbqyo&callback=initMap">
</script>

<script src="jquery-3.2.1.min.js"></script>

<script type="text/javascript">

  $('#makam').on('change', function() {
      changeMarker(this.value);
  })
</script>



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