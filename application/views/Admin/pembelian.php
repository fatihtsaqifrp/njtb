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
                        <h4 class="page-title">Pembelian</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url() ?>admin/dasboard">Dashboard</a></li>
                            <li><a href="#">Pembelian</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Informasi Keuangan</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Pembeli</th>
                                            <th>Status</th>
                                            <th>Tgl Pemesanan</th>
                                            <th>Tgl Pembayaran</th>
                                            <th>Tgl Barang Sampai</th>

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                 
                                    foreach ($data as $row)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row['username']."</td>";
                                        echo "<td>".$row['successkah']."</td>";
                                        echo "<td>".gmdate("d/m/Y",$row['tgl_pesan'])."</td>";?>
                                        <td><?php if(!empty($row['tgl_paid'])){echo gmdate("d/m/Y",$row['tgl_paid']);}else{echo "Belum Dibayar";} ?></td>
                                        <td><?php if(!empty($row['tgl_sampai'])){echo gmdate("d/m/Y",$row['tgl_sampai']);}else{echo "Belum Sampai";} ?></td>
                                        <?php
                                        echo '
                                        <td>
                                        <button type="button" class="btn btn-default" onclick="lihatbarang(\''.$row['id'].'\');">Lihat Barang</button>
                                        <button type="button" class="btn btn-default" onclick="window.location=\''.base_url("admin/detail_pembelian/".$row['id']).'\';">Sunting</button>
                                       
                                        </td>';
                                        echo "</tr>";
                                    }
                                     ?>
                                    </tbody>
                                </table>
                            </div>
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
     <!-- Modal -->
  <div class="modal fade" id="lihatbarang" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Barang</h4>
        </div>
        <div class="modal-body">
          <p id="barangoutput"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
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
    function lihatbarang(idbarang){
        $("#lihatbarang").modal('show')
        document.getElementById('barangoutput').innerHTML = "Please Wait";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('barangoutput').innerHTML = this.responseText;
        }
  };
  xhttp.open("POST", "<?= base_url("admin/lihatbarang") ?>", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id="+idbarang);

    }
</script>
</body>

</html>
