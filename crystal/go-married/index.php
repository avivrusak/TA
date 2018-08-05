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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>E-Graveyard</title>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="E-Graveyard" name="description">
    <meta content="E-Graveyard" name="author">
    <!--Fav-->
    <link href="images/favicon.ico" rel="shortcut icon">
    
    <!--styles-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    
    <!--fonts google-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>
       <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!--PRELOADER-->
    <div id="preloader">
      <div id="status">
        <img alt="logo" src="images/logo-big.png">
      </div>
    </div>
    <!--/.PRELOADER END-->

    <!--HEADER -->
    <div class="header">
      <div class="for-sticky">
        <!--LOGO-->
        <div class="col-md-2 col-xs-6 logo">
          <a href="index.html"><img alt="logo" class="logo-nav" src="images/logo-big.png"></a>
          
        </div>

      

        <!--/.LOGO END-->
      </div>
      <div class="menu-wrap">
        <nav class="menu">
          <div class="menu-list">
            
            <a data-scroll="" href="#about">
              <span>Form Registration Jenazah</span>
            </a>
            <a data-scroll="" href="#form2">
              <span>Form Registration Ahli Waris</span>
            </a>
             <a data-scroll="" href="#">
              <span>Save to PDF</span>
            </a>
          </div>
        </nav>
        <button class="close-button" id="close-button">Close Menu</button>
      </div>
      <button class="menu-button" id="open-button">
        <span></span>
        <span></span>
        <span></span>
      </button><!--/.for-sticky-->
    </div>
    <!--/.HEADER END-->
    
    <!--CONTENT WRAP-->
    <div class="content-wrap">
      <!--CONTENT-->
      <div class="content" >

        <form name="form1" role="form" method="POST" action="insert.php">

        <!--FORM MEMPELAI-->
        <section id="about" style="background-color: white;">
          <div class="col-md-6 col-xs-12 no-pad">
            <div class="bg-about" style="background: url('images/tpu2.jpg'); width: 100%; height: 100%;"></div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12 white-col">
            <div class="row">
              <!--OWL CAROUSEL2-->
              <div class="owl-carousel2 ">
                <div class="col-md-12">
                  <div class="col-md-12">
                     
                          <fieldset>
                              <legend>Data Diri Jenazah</legend>

                              <div class="form-group col-md-6">
                                  <label for="nama_jenazah">Nama</label>
                                  <input type="text" class="form-control" name="nama_jenazah" id="full_name" placeholder="Full Name">
                              </div>

                              <div class="form-group col-md-6">
                                  <label for="NIK">NIK</label>
                                  <input type="text" class="form-control" name="NIK" id="NIK" placeholder="NIK">
                              </div>

                              <div class="form-group col-md-12">
                                  <label for="alamat">Alamat</label>
                                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat saat ini">
                              </div>

                              <div class="form-group col-md-6">
                                  <label for="tempat_lahir">Tempat Lahir</label>
                                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Kota/Kabupaten Anda Lahir">
                              </div>

                              <div class="form-group col-md-6">
                                  <label for="tanggal_lahir">Tanggal Lahir</label>
                                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                              </div>
                         
                            
                              <div class="form-group col-md-6">
                                  <label for="jenis_kelamin">Jenis Kelamin</label>
                                  <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                      <option value="pilih" disabled selected>... Pilih Jenis Kelamin ...</option>
                                      <option value="laki-laki">Laki-Laki</option>
                                      <option value="perempuan">Perempuan</option>
                                      
                                  </select>
                              </div>

                          </fieldset>
                  </div>
                </div>
              
                
              <!--/.OWL CAROUSEL2 END-->
            </div>
          </div>
        </section>
        <!--/.FORM MEMPELAI END-->

        <!--FORM ORTU-->
        <section id="form2">
          <div class="col-md-6 col-xs-12 no-pad" style="float: right;">
            <div class="bg-about" style="background: url('images/fam3.jpg'); width: 100%; height: 100%;"></div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12 white-col" style="float: left;">
            <div class="row">
              <!--OWL CAROUSEL2-->
              <div class="owl-carousel2">
                <div class="col-md-12">
                  <div class="col-md-12">
                          <fieldset>
                              <legend>Data Ahli Waris</legend>

                              <div class="form-group col-md-6">
                                  <label for="nama_w">Nama</label>
                                  <input type="text" class="form-control" name="nama_w" id="nama_w" placeholder="Nama Lengkap">
                              </div>

                              <div class="form-group col-md-6">
                                  <label for="NIK_w">NIk</label>
                                  <input type="text" class="form-control" name="NIK_w" id="NIK_w" placeholder="NIK">
                              </div>

                              <div class="form-group col-md-12">
                                  <label for="alamat_w">Alamat</label>
                                  <input type="text" class="form-control" name="alamat_w" id="alamat_w" placeholder="Alamat saat ini">
                              </div>

                               <div class="form-group col-md-6">
                                  <label for="tempat_lahir">Tempat Lahir</label>
                                  <input type="text" class="form-control" name="tempat_lahir_w" id="tempat_lahir_w" placeholder="Kota/Kabupaten Anda Lahir">
                              </div>

                              <div class="form-group col-md-6">
                                  <label for="tanggal_lahir">Tanggal Lahir</label>
                                  <input type="date" class="form-control" name="tanggal_lahir_w" id="tanggal_lahir_w">
                              </div>


                              <div class="form-group col-md-6">
                                  <label for="no_telp_w">No Telpon</label>
                                  <input type="text" class="form-control" name="no_telp_w" id="no_telp_w" placeholder="No Telepon">
                              </div>


                              <div class="form-group col-md-6">
                                  <label for="jenis_kelamin_w">Jenis Kelamin</label>
                                  <select class="form-control" name="jenis_kelamin_w" id="jenis_kelamin_w">
                                      <option value="pilih" disabled selected>... Pilih Jenis Kelamin ...</option>
                                      <option value="laki-laki">Laki-Laki</option>
                                      <option value="perempuan">Perempuan</option>
                                      
                                  </select>
                              </div>


                              <div class="form-group col-md-6">
                                  <label for="tpu_w">Makam</label>

                                  <select class="form-control" name="tpu_w" id="tpu_w" <?= isset($_GET['id']) ? 'disabled' : null?>>
                                            <?php while ($row = mysqli_fetch_assoc($sql)){

                                             ?>

                                             <option value="<?php echo $row['ID_TPU'] ?>" <?= (isset($_GET['id']) && $_GET['id'] == $row['ID_TPU']) ? 'selected' : null?>><?php echo $row['nama_lokasi']?></option>
                                             <?php } ?>

                                         </select>
                                  <?php if (isset($_GET['id'])) { ?>
                                  z<input type="hidden" name="tpu_w" value="<?=$_GET['id']?>">
                                  <?php } ?>
                              </div>




                              <!-- <div class="form-group col-md-6">
                                  <label for="tanggal_sewa">Tanggal Sewa</label>
                                  <input type="date" class="form-control" name="tanggal_sewa" id="tanggal_sewa">
                              </div> -->

                          </fieldset>
                  </div>
                </div>
              
                

                
              <!--/.OWL CAROUSEL2 END-->
            </div>
          </div>
        </section>
        <!--/.FORM ORTU END-->

        
        <footer>
          <div class="footer-top" style="background-color: #000; margin-top: 5%;">
            <div class="col-md-12">
              <input type="submit" name="btn_add" style="background-color: #000; height: 100%; border-color: #000;">
            </div>
          </div>

          <div class="footer-bottom">
            <div class="container">
              <div class="row">
                <a href="http://designscrazed.org/"><img src="images/logo-bottom.png" alt="crafted with love" class="center-block" /></a>
              </div>
            </div>
          </div>
        </footer>

        </form>

      <!--/.CONTENT END-->
      </div>
    <!--/.CONTENT-WRAP END-->
    </div>
    

    <script>  
     $(document).ready(function(){  

          $(document).on('click', '#btn_add', function(){  

               var nama_ = document.form1.nama_jenazah;
               var alamat_ = document.form1.alamat;
               var tempat_ = document.form1.tempat_lahir;  
               var tgl_ = document.form1.tanggal_lahir;
               var jeniskelamin_ = document.form1.jenis_kelamin;
                
               var namaw_ = document.form1.nama_w;
               var alamatw_ = document.form1.alamat_w; 
               var tempatw_ = document.form1.tempat_lahir_w;  
               var tglw_ = document.form1.tanggal_lahir_w;
               var notelpw_ = document.form1.no_telp_w;
               var jeniskelaminw_ = document.form1.jenis_kelamin_w;
               var tanggal_sewa = document.form1.tanggal_sewa;               
               
          });    
     }); 
   </script>

    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.appear.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/classie.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="js/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="js/masonry.js" type="text/javascript"></script>
    <script src="js/smooth-scroll.min.js" type="text/javascript"></script>
    <script src="js/typed.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
  </body>
</html>