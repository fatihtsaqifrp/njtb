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
                        <h4 class="page-title">Detail Pembelian</h4> </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?= base_url() ?>admin/dasboard">Dashboard</a></li>
                            <li><a href="<?= base_url() ?>admin/pembelian">Pembelian</a></li>
                            <li><a href="#">Detail Pembelian</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Detail Pembelian</h3>
                            <form method="POST" action="<?= base_url("admin/savepembelian/".$transaksi['id'])?>">
                             <div class="table-responsive">
                            <table class="table">
                            <TR>
                            <td width="350px">Pembeli</td>
                            <td><?= $username; ?></td> 
                            </TR>
                            <TR>
                            <td>Tgl Di Pesan</td>
                            <td><?= gmdate("d/m/Y",$transaksi['tgl_pesan']); ?></td> 
                            </TR>
                            <TR>
                            <td>Tgl Di Bayar</td>
                            <td>  <input placeholder="masukkan tanggal Product Dibayar" type="text" value="<?php if(!empty($transaksi['tgl_sampai'])){echo gmdate("d/m/Y",$transaksi['tgl_paid']);} ?>" class="form-control datepicker" name="tgl_paid"></td> 
                            </TR>
                            <TR>
                            <td>Tgl Sampai</td>
                            <td>  <input placeholder="masukkan tanggal Product Sampai" type="text" value="<?php if(!empty($transaksi['tgl_sampai'])){echo gmdate("d/m/Y",$transaksi['tgl_sampai']);} ?>" class="form-control datepicker" name="tgl_sampai"></td> 
                            </TR>
                            <TR>
                            <td>Barang Berhasil Diterima Konsumen</td>
                            <td>
                           
                            <select class="form-control" name="success" id="success" required>
                                    <option value="0">Proccessing</option>
                                    <option value="1">Success</option>
                                    <option value="2">Cancelled</option>
	                        </select>
                            </td> 
                            </TR>
                            </TABLE>
                            </div>
                            <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Detail Barang Pembelian</h3>

                            <div class="table-responsive">
	<table class="table">
	<thead>
	<tr>
		<th>Nama Barang</th>
		<th>Harga Barang</th>
		<th>Jumlah Barang</th>
		<th>Total Harga</th>
	</tr>
</thead>
<tbody><?php
		$totalharga = 0;
		foreach ($barang->result() as $row)
		{
			echo '<tr>';
			echo '<td>'.$row->nama_barang.'</td>';
			echo '<td>'.$row->harga_barang.'</td>';
			echo '<td>'.$row->jumlah_barang.'</td>';
			echo '<td>Rp.'.($row->harga_barang * $row->jumlah_barang).'</td>';
			echo '</tr>';
			$totalharga = $totalharga + ($row->harga_barang * $row->jumlah_barang);
		}
        ?>
	<tr><td></td><td></td><td align="right">Total:</td><td>Rp.<?=$totalharga ?></td></tr></tbody></table></div>
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
 <Script>
 document.getElementById("success").value = "<?= $transaksi['success']; ?>";
</script>
</body>

</html>
