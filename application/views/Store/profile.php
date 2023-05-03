<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>res/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="<?= base_url() ?>res/js/jquery.js"></script>
  <script src="<?= base_url() ?>res/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 400 15px/1.8 Lato, sans-serif;
    color: #777;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;      
    font-size: 20px;
    color: #111;
  }
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    -webkit-filter: grayscale(90%);
    filter: grayscale(90%); /* make all photos black and white */ 
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail p {
    margin-top: 15px;
    color: #555;
  }
  .btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
  }
  .modal-header, h4, .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-header, .modal-body {
    padding: 40px 50px;
  }
  .nav-tabs li a {
    color: #777;
  }
  #googleMap {
    width: 100%;
    height: 400px;
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  }  
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color: #2d2d30;
    border: 0;
    font-size: 11px !important;
    letter-spacing: 4px;
    opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: red !important;
  }
  footer {
    background-color: #2d2d30;
    color: #f5f5f5;
    padding: 32px;
  }
  footer a {
    color: #f5f5f5;
  }
  footer a:hover {
    color: #777;
    text-decoration: none;
  }  
  .form-control {
    border-radius: 0;
  }
  textarea {
    resize: none;
  }
  @media (max-width: 750px) {
    .responlogo {
    position: absolute;
    left: 50%;
    margin-left: -50px !important; 
    display: block;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     
      <a href="<?= base_url("store"); ?>" class="responlogo" style="padding-top:2px;padding-left:8px;">
      <img src="<?= base_url("assets/logo2.png"); ?>" width="100px" style="height:50px;padding:1px;">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= base_url("store"); ?>">RUMAH</a></li>
        <?= $nav; ?>
        <li><a href="#" id="cartbtn" onclick="seecart();" >KERANJANG(0)</a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="tour" class="bg-1" style="padding-top:100px !important;">
  <div class="container" style="padding:10px !important;">
  <span style="font-size:20px;">Profile Anda</span>
  <div  class="col-md-12">
  <form class="form-horizontal form-material" method="POST" action="<?= base_url("store/saveprofile") ?>">
                                <div class="form-group">
                                    <label class="col-md-12">Nama Lengkap</label>
                                    <div class="col-md-12">
                                        <input type="text" name="nickname" placeholder="Johnathan Doe" value="<?= $data['nickname'] ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" name="username" placeholder="username" value="<?= $data['username'] ?>" class="form-control form-control-line" id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" placeholder="johnathan@admin.com" value="<?= $data['email'] ?>" class="form-control form-control-line"  id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Nomor Telp</label>
                                    <div class="col-md-12">
                                        <input type="text" name="telp" placeholder="123 456 7890" value="<?= $data['telp'] ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Alamat</label>
                                    <div class="col-md-12">
                                        <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" value="<?= $data['alamat'] ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kecamatan</label>
                                    <div class="col-md-12">
                                        <input type="text" name="kecamatan" placeholder="Kecamatan Anda" value="<?= $data['kecamatan'] ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kabupaten/Kota</label>
                                    <div class="col-md-12">
                                        <input type="text" name="kota" placeholder="Kabupaten/Kota Anda" value="<?= $data['kota'] ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Provinsi</label>
                                    <div class="col-md-12">
                                        <input type="text" name="prov" placeholder="Provinsi Anda" value="<?= $data['prov'] ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kode Pos</label>
                                    <div class="col-md-12">
                                        <input type="text" name="postal" placeholder="Kode Pos Anda" value="<?= $data['postal'] ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Simpan Profil</button>
                                    </div>
                                </div>
                            </form>
 
</div></div></div></div>



<!-- Footer -->
<footer class="text-center">
<a target="_blank" href=""></a>
</footer>
  <!-- Modal -->
  <div class="modal fade" id="cartnya" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="padding:10px !important;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:left;font-size:18px;letter-spacing: 0px !important;"><b>Cart</b></h4>
        </div>
        <div class="modal-body">
          <p id="hasilnya">This is a large modal.</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="infobeli();">Beli</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Lanjutkan Belanja</button>
        </div>
      </div>
    </div>
  </div>
<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>
<script>
getnumbercart();
function infobeli(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          if(this.responseText==0){
          loginmodal();
          }else{
          document.getElementById('hasilnya').innerHTML = this.responseText;
          document.getElementsByClassName("modal-footer")[0].innerHTML = '<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button><button type="button" class="btn btn-default" onclick="golihat();">Lihat Pesanan Saya</button>';
        }}
  };
  xhttp.open("GET", "<?= base_url("store/infobeli"); ?>", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("");
}
function golihat(){
window.location="<?= base_url("Store/product"); ?>";
}
function deletecart(id){
  var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          updatecart();
        }
  };
  xhttp.open("GET", "<?= base_url("store/deletefromcart/"); ?>"+id, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("");
}
function addcart(id){
  var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          seecart();
        }
  };
  xhttp.open("GET", "<?= base_url("store/addtocart/"); ?>"+id, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("");
}
function kurangcart(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          updatecart();
        }
  };
  xhttp.open("GET", "<?= base_url("store/kurangcart/"); ?>"+id, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("");
}
function tambahcart(id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          updatecart();
        }
  };
  xhttp.open("GET", "<?= base_url("store/tambahcart/"); ?>"+id, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("");
}
function seecart(){
  $("#cartnya").modal('show')
        document.getElementById('hasilnya').innerHTML = "Please Wait";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('hasilnya').innerHTML = this.responseText;
            getnumbercart();
        }
  };
  xhttp.open("GET", "<?= base_url("store/seecart"); ?>", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("");
}
function updatecart(){
  document.getElementById('hasilnya').innerHTML = "Please Wait";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('hasilnya').innerHTML = this.responseText;
            getnumbercart();
        }
  };
  xhttp.open("GET", "<?= base_url("store/seecart"); ?>", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("");
}
function getnumbercart(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('cartbtn').innerHTML = "KERANJANG("+this.responseText+")";
        }
  };
  xhttp.open("GET", "<?= base_url("store/countcart"); ?>", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("");
}
</script>
</body>
</html>

