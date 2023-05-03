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
                        <h4 class="page-title">Pegawai List </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 

                        <ol class="breadcrumb">
                            <li><a href="<?= base_url() ?>admin/dasboard">Dashboard</a></li>
                            <li class="active">Pegawai</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                        <h3 class="box-title">List Pegawai</h3>
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Pegawai</th>
                                            <th>Email</th>
                                            <th>No telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                  
                                    foreach ($data1->result() as $row)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row->username."</td>";
                                        echo "<td>".$row->email."</td>";
                                        echo "<td>".$row->telp."</td>";
                                        echo '
                                        <td>
                                        <button type="button" class="btn btn-default" onclick="window.location=\''.base_url("admin/detail_pegawai/".$row->id).'\';">Sunting</button>
                                        <button type="button" class="btn btn-danger" onclick="window.location=\''.base_url("admin/deletepegawai/".$row->id).'\';">Hapus</button>
                                        </td>';
                                        echo "</tr>";
                                    }
                                     ?>
                                    </tbody>
                                </table>

                            </div>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adduser">Tambah Pegawai</button>

                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                        <h3 class="box-title">List Pemasok</h3>
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Pemasok</th>
                                            <th>Email</th>
                                            <th>No telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                  
                                    foreach ($data2->result() as $row)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row->username."</td>";
                                        echo "<td>".$row->email."</td>";
                                        echo "<td>".$row->telp."</td>";
                                        echo '
                                        <td>
                                        <button type="button" class="btn btn-default" onclick="window.location=\''.base_url("admin/detail_pegawai/".$row->id).'\';">Sunting</button>
                                        <button type="button" class="btn btn-danger" onclick="window.location=\''.base_url("admin/deletepegawai/".$row->id).'\';">Hapus</button>
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
            <div class="row">
        
                    <div class="col-md-12">
                        <div class="white-box">
                        <h3 class="box-title">List Konsumen</h3>
                        <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Konsumen</th>
                                            <th>Email</th>
                                            <th>No telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                  
                                    foreach ($data3->result() as $row)
                                    {
                                        echo "<tr>";
                                        echo "<td>".$row->username."</td>";
                                        echo "<td>".$row->email."</td>";
                                        echo "<td>".$row->telp."</td>";
                                        echo '
                                        <td>
                                        <button type="button" class="btn btn-default" onclick="window.location=\''.base_url("admin/detail_pegawai/".$row->id).'\';">Sunting</button>
                                        <button type="button" class="btn btn-danger" onclick="window.location=\''.base_url("admin/deletepegawai/".$row->id).'\';">Hapus</button>
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
                <!-- Modal -->
  <div class="modal fade" id="adduser" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Users</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal form-material" method="POST" action="<?= base_url("admin/adduser"); ?>">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="nickname" placeholder="Johnathan Doe" value="" class="form-control form-control-line" required> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" name="username" placeholder="username" value="" class="form-control form-control-line" id="example-email" required> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" placeholder="johnathan@admin.com" value="" class="form-control form-control-line"  id="example-email" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" class="form-control form-control-line" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" name="telp" placeholder="123 456 7890" value="" class="form-control form-control-line" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Alamat</label>
                                    <div class="col-md-12">
                                        <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" value="" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kecamatan</label>
                                    <div class="col-md-12">
                                        <input type="text" name="kecamatan" placeholder="Kecamatan Anda" value="" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kabupaten/Kota</label>
                                    <div class="col-md-12">
                                        <input type="text" name="kota" placeholder="Kabupaten/Kota Anda" value="" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Provinsi</label>
                                    <div class="col-md-12">
                                        <input type="text" name="prov" placeholder="Provinsi Anda" value="" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kode Pos</label>
                                    <div class="col-md-12">
                                        <input type="text" name="postal" placeholder="Kode Pos Anda" value="" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
  <label for="sel1">Job/Level:</label>
  <select class="form-control" name="level" required>
    <option value="0">Users</option>
    <option value="1">Pemasok</option>
    <option value="2">Keuangan</option>
    <option value="3">Pegawai</option>
  </select>
</div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Tambah Pegawai</button>
                                    </div>
                                </div>
                            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
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
    <script src="<?= base_url() ?>res/plugins/bower_components/toast-master/js/jquery.toast.js"></script>

</body>

</html>
