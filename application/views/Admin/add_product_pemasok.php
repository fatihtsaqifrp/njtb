<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>res/plugins/images/favicon.png">
    <title><?= $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>res/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?= base_url() ?>res/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?= base_url() ?>res/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?= base_url() ?>res/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= base_url() ?>res/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>res/css/style.css" rel="stylesheet">
    <!-- DatePicker CSS -->
    <link href="<?= base_url() ?>res/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= base_url() ?>res/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
      
       <?php echo $getnav; ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Tambah Produk</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="dasboard">Dashboard</a></li>
                            <li><a href="product">Produk</a></li>
                            <li><a href="#">Tambah Produk</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Tambah Produk</h3>
                            <form class="form-horizontal form-material" enctype="multipart/form-data" method="post" accept-charset="utf-8" action="<?= base_url("admin/insertproductpemasok")?>">
                                <div class="form-group">
                                    <label class="col-md-12">Nama Barang</label>
                                    <div class="col-md-12">
                                        <input type="text" name="nama_barang" placeholder="nama produk"  class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Jenis Barang</label>
                                    <div class="col-md-12">
                                    <select class="form-control" name="jenis_barang" required>
                                    <option value="1">Jaket</option>
                                    <option value="2">Baju</option>
                                    <option value="3">Sweater</option>
                                    <option value="4">Barang lain</option>
	                                </select>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Stok Barang</label>
                                    <div class="col-md-12">
                                        <input type="number" name="stok_barang" value="1" placeholder="100" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Harga Barang</label>
                                    <div class="col-md-12">
                                    <input type="number" name="harga_barang" placeholder="125000" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Tanggal Barang</label>
                                    <div class="col-md-12">
                                    <input placeholder="masukkan tanggal Product" type="text" value="<?php echo date("d/m/Y"); ?>" class="form-control datepicker" name="tgl_barang">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Keterangan Barang</label>
                                    <div class="col-md-12">
                                    <textarea rows="5" name="ket_barang" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-4">
                                <div class="panel panel-success">
                                <div class="panel-heading">Tampilan Barang</div>
                              <div class="panel-footer"><input type="file" name="imageURL" id="url" class="form-control" data-icon="false" data-buttontext="Choose image"></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Tambah Barang</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                    </div>
                </div>
            
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"><a target="_blank" href=""></a></footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>res/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>res/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>res/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url() ?>res/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>res/js/waves.js"></script>
    <!--Counter js -->
    <script src="<?= base_url() ?>res/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?= base_url() ?>res/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="<?= base_url() ?>res/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="<?= base_url() ?>res/plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>res/js/custom.min.js"></script>
    <script src="<?= base_url() ?>res/js/dashboard1.js"></script>
    <script src="<?= base_url() ?>res/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url() ?>res/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>
</body>

</html>
