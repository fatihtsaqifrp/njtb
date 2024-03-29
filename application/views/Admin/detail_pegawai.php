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
                        <h4 class="page-title">Detail Pegawai</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url() ?>Admin/dasboard">Dashboard</a></li>
                            <li><a href="<?= base_url() ?>Admin/pegawai">Pegawai</a></li>
                            <li><a href="#">Detail Pegawai</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Detail Pegawai</h3>
                            <form class="form-horizontal form-material" method="POST" action="<?= base_url("admin/savepegawai/".$data['id'])?>">
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
                                    <label class="col-md-12">No Telp</label>
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
                                        <button class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                    </div>
                </div>
            
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> <a target="_blank" href=""></a> </footer>
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
