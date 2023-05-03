<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();		
		if ($this->session->userdata['login_ok']!=true OR $this->session->userdata('login_level')==0)
        {
			redirect(base_url("store"));
        }
		$this->load->model('admin_model');
		$this->load->model('Upload_model', 'upl');
	}
	public function index()
	{	
		redirect(base_url("Admin/dasboard"));
	}
	function dasboard(){
		$nav = $this->getnav();
		$nav["data"]=$this->admin_model->getdasboardinfo();
		$nav["title"]="Admin Dasboard";
		$this->load->view('Admin/dasboard',$nav);
	}

	function profile(){
		if($this->checkpermission("profile")==false){redirect(base_url('auth'));}
		$uid = $this->session->userdata('login_id');
		$nav = $this->getnav();
		$data = $this->admin_model->getprofile($uid);
		$nav["data"]=$data;
		$nav["title"]="Admin Profil";
		$this->load->view('Admin/profile',$nav);
	}
	function product(){
		if($this->checkpermission("product")==false){redirect(base_url('auth'));}
		$uid = $this->session->userdata('login_id');
		$nav = $this->getnav();
		$level = $this->session->userdata('login_level');
		if($level==1){
			$data = $this->admin_model->getproductlistbyuser($uid);
			if ($data){
				$nav["data"]=$data;
			}else{
				$nav["data"]=array();
			}
		}else{
			$data = $this->admin_model->getproductlist();
			if ($data){
				$nav["data"]=$data->result();
			}else{
				$nav["data"]=array();
			}
		}
		
		$nav["title"]="Admin Produk";
		if($level==1){
			$this->load->view('Admin/product_pemasok',$nav);
		}else{
			$this->load->view('Admin/product',$nav);
		}
		
	}
	function detail_product($id){
		if($this->checkpermission("detail_product")==false){redirect(base_url('auth'));}
		$uid = $this->session->userdata('login_id');
		$nav = $this->getnav();
		$data = $this->admin_model->getproductdata($id);
		$nav["data"]=$data;
		$nav["pic"] = base_url("assets/uploads/").$this->upl->getimageurl($data['id_pic']);
		$nav["title"]="Admin Detail Product";
		$this->load->view('Admin/detail_product',$nav);
	}
	function detail_pembelian($id){
		if($this->checkpermission("detail_pembelian")==false){redirect(base_url('auth'));}
		$uid = $this->session->userdata('login_id');
		$nav = $this->getnav();
		$data1 = $this->admin_model->getpembeliandata($id);
		$data2 = $this->admin_model->getbarangtransaksi($id);
		$nick = $this->admin_model->getnickname($data1['id_user']);
		$nav["transaksi"]=$data1;
		$nav["barang"]=$data2;
		$nav["username"]=$nick;
		$nav["title"]="Admin Detail Pembelian";
		$this->load->view('Admin/detail_pembelian',$nav);
	}
	function detail_pegawai($id){
		if($this->checkpermission("detail_pegawai")==false){redirect(base_url('auth'));}
		$uid = $this->session->userdata('login_id');
		$nav = $this->getnav();
		$data = $this->admin_model->getpegawaidata($id);
		$nav["data"]=$data;
		$nav["title"]="Admin Detail Pegawai";
		$this->load->view('Admin/detail_pegawai',$nav);
	}
	function pegawai(){
		if($this->checkpermission("pegawai")==false){redirect(base_url('auth'));}
		$uid = $this->session->userdata('login_id');
		$nav = $this->getnav();
		$nav["data1"]=$this->admin_model->getpegawailist();
		$nav["data2"]=$this->admin_model->getpemasoklist();
		$nav["data3"]=$this->admin_model->getuserslist();
		$nav["title"]="Admin Pegawai";
		$this->load->view('Admin/pegawai',$nav);
	}
	function keuangan(){
		if($this->checkpermission("keuangan")==false){redirect(base_url('auth'));}
		$uid = $this->session->userdata('login_id');
		$nav = $this->getnav();
		//$nav["data"]=$this->admin_model->getkeuanganlist();
		$nav["title"]="Admin Keuangan";
		$this->load->view('Admin/keuangan',$nav);
	}
	function pembelian(){
		if($this->checkpermission("pembelian")==false){redirect(base_url('Auth'));}
		$uid = $this->session->userdata('login_id');
		$nav = $this->getnav();
		$data= $this->admin_model->getpembelianlist();
		$loop = 1;
		if(empty($data)){
			$pembelian=array();
		}else{
		foreach ($data->result() as $row)
		{
			$pembelian[$loop]['id_user']=$row->id_user;
			$pembelian[$loop]['id']=$row->id;
			$nick = $this->admin_model->getnickname($row->id_user);
			$pembelian[$loop]['username']=$nick;
			$pembelian[$loop]['success']=$row->success;
			if($row->success==1){$success = '<span class="label label-success">Success</span>';}
			if($row->success==0){$success = '<span class="label label-warning">Processing</span>';	}
			if($row->success==2){$success = '<span class="label label-danger">Canceled</span>';	}
			$pembelian[$loop]['successkah']=$success;
			$pembelian[$loop]['tgl_pesan']=$row->tgl_pesan;
			$pembelian[$loop]['tgl_paid']=$row->tgl_paid;
			$pembelian[$loop]['tgl_sampai']=$row->tgl_sampai;
			$loop++;
		}
	}
		$nav["title"]="Admin pembelian";
		$nav["data"] = $pembelian;
		$this->load->view('Admin/pembelian',$nav);
	}
	function addproduct(){
		$uid = $this->session->userdata('login_id');
		$nav = $this->getnav();
		$nav["title"]="Admin Tambah Product";
		$level = $this->session->userdata('login_level');
		if($level==1){
			$this->load->view('Admin/add_product_pemasok',$nav);
		}else{
			$this->load->view('Admin/add_product',$nav);
		}
		
		
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Store'));
	}
	function lihatbarang(){
		$idbarang = $this->input->post('id');
		$barang = $this->admin_model->getbarangtransaksi($idbarang);
	echo '<div class="table-responsive">
	<table class="table">
	<thead>
	<tr>
		<th>Nama Barang</th>
		<th>Harga Barang</th>
		<th>Jumlah Barang</th>
		<th>Total Harga</th>
	</tr>
</thead>
<tbody>';
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
	echo '<tr><td></td><td></td><td align="right">Total:</td><td>Rp.'.$totalharga.'</td></tr></tbody></table></div>';
	}
	function seeimage($id){
		 $imgpath =  base_url("assets/uploads/").$this->upl->getimageurl($id);
		 redirect($imgpath);
		 /*METODE TERLALU LAMBAT
		 $imgpath =  base_url("assets/uploads/").$this->upl->getimageurl($id);
		 $image = getimagesize($imgpath);
		 $mime_type = $image['mime'];
		 switch ($mime_type){
			 case "image/jpeg":
				 header('Content-Type: image/jpeg');
				 $img = imagecreatefromjpeg($imgpath);
				 imagejpeg($img);
				 break;
			 case "image/png":
				 header('Content-Type: image/png');
				 $img = imagecreatefrompng($imgpath);
				 $background = imagecolorallocate($img, 0, 0, 0);
				 imagecolortransparent($img, $background);
				 imagealphablending($img, false);
				 imagesavealpha($img, true);
				 imagepng($img);
				  
				 break;
			 case "image/gif":
				 header('Content-Type: image/gif');
				 $img = imagecreatefromgif($imgpath);
				 $background = imagecolorallocate($img, 0, 0, 0);
				 imagecolortransparent($img, $background);
				 imagegif($img);
				 break;
		 }
		 // Free up memory
		 imagedestroy($img);*/
	}
	function insertproductpemasok(){
		$hemm = "";
		if ( strlen($_FILES['imageURL']['name']) > 0){
		$path = ROOT_UPLOAD_PATH;
		// Define file rules
		$config['upload_path'] = FCPATH."assets\uploads";
		$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
     
        $imagename = 'no-img.jpg';
        if (!$this->upload->do_upload('imageURL')) {
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
			die();
        } else {
            $data = $this->upload->data();
            $imagename = $data['file_name'];
            $this->upl->setURL($imagename);            
			$hemm = $this->upl->create();             
            //$this->session->set_flashdata('img_uploaded_msg', '<div class="alert alert-success">Image uploaded successfully!</div>');
			//$this->session->set_flashdata('img_uploaded', $imagename);
			//$hemm = HTTP_UPLOAD_PATH.$imagename;
		} 
		}
		$uid = $this->session->userdata('login_id');
		$product['nama_barang'] = $this->input->post('nama_barang');
		$product['jenis_barang'] = $this->input->post('jenis_barang');
		$product['stok_barang'] = $this->input->post('stok_barang');
		$product['harga_barang'] = $this->input->post('harga_barang');
		$product['tgl_barang'] = strtotime(str_replace('/', '-', $this->input->post('tgl_barang')." 10:20:30"));
		$product['keterangan_barang'] = $this->input->post('ket_barang');
		$product['id_pic'] = $hemm;
		$cek = $this->admin_model->addproduct($product);
		if($cek == false){
			redirect(base_url('Admin/addproduct?act=gagal'));
		}else{
			$pemasok['id_barang']=$cek;
			$pemasok['id_user']=$uid;
			$pemasok['jumlah_barang']=$product['stok_barang'];
			$pemasok['harga_barang']=$product['harga_barang'];
			$pemasok['tgl']=time();
			$cek1 = $this->admin_model->addpemasok($pemasok);
			if($cek1 == false){
				redirect(base_url('Admin/addproduct?act=gagal'));
			}else{
				redirect(base_url('Admin/detail_product/'.$cek));
			}
		}
	}
	function insertproduct(){
		$hemm = "";
		if ( strlen($_FILES['imageURL']['name']) > 0){
		$path = ROOT_UPLOAD_PATH;
		// Define file rules
		$config['upload_path'] = FCPATH."assets\uploads";
		$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
     
        $imagename = 'no-img.jpg';
        if (!$this->upload->do_upload('imageURL')) {
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
			die();
        } else {
            $data = $this->upload->data();
            $imagename = $data['file_name'];
            $this->upload->setURL($imagename);              
			$hemm = $this->upload->create();             
            //$this->session->set_flashdata('img_uploaded_msg', '<div class="alert alert-success">Image uploaded successfully!</div>');
			//$this->session->set_flashdata('img_uploaded', $imagename);
			//$hemm = HTTP_UPLOAD_PATH.$imagename;
		} 
		}
		$product['nama_barang'] = $this->input->post('nama_barang');
		$product['jenis_barang'] = $this->input->post('jenis_barang');
		$product['stok_barang'] = $this->input->post('stok_barang');
		$product['harga_barang'] = $this->input->post('harga_barang');
		$product['tgl_barang'] = strtotime(str_replace('/', '-', $this->input->post('tgl_barang')." 10:20:30"));
		$product['keterangan_barang'] = $this->input->post('ket_barang');
		$product['id_pic'] = $hemm;
		$cek = $this->admin_model->addproduct($product);
		if($cek == false){
			redirect(base_url('Admin/addproduct?act=gagal'));
		}else{
			redirect(base_url('Admin/detail_product/'.$cek));
		}
	}
	function saveproduct($id){
		$hemm = $this->admin_model->getbarangimg($id);
		if ( strlen($_FILES['imageURL']['name']) > 0){
		$path = ROOT_UPLOAD_PATH;
		// Define file rules
		$config['upload_path'] = FCPATH."assets\uploads";
		$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
     
        $imagename = 'no-img.jpg';
        if (!$this->upload->do_upload('imageURL')) {
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
			die();
        } else {
            $data = $this->upload->data();
            $imagename = $data['file_name'];
            $this->upl->setURL($imagename);        
			$hemm = $this->upl->create();             
            //$this->session->set_flashdata('img_uploaded_msg', '<div class="alert alert-success">Image uploaded successfully!</div>');
			//$this->session->set_flashdata('img_uploaded', $imagename);
			//$hemm = HTTP_UPLOAD_PATH.$imagename;
		} 
		}
		$product['nama_barang'] = $this->input->post('nama_barang');
		$product['jenis_barang'] = $this->input->post('jenis_barang');
		$product['stok_barang'] = $this->input->post('stok_barang');
		$product['harga_barang'] = $this->input->post('harga_barang');
		$product['tgl_barang'] = strtotime(str_replace('/', '-', $this->input->post('tgl_barang')." 10:20:30"));
		$product['keterangan_barang'] = $this->input->post('ket_barang');
		$product['id_pic'] = $hemm;
		
		$cek = $this->admin_model->saveproduct($product,$id);
		if($cek == false){
			redirect(base_url('Admin/detail_product/'.$id.'?act=gagal'));
		}else{
			redirect(base_url('Admin/detail_product/'.$id.'?act=ok'));
		}
	}
	function recenttransaction(){
		$transaksi = $this->admin_model->getpembelianlist();
		$loop = 1;
		foreach ($transaksi->result() as $row)
		{
			$nick = $this->admin_model->getnickname($row->id_user);
			if($row->success){$success = '<span class="label label-success">Success</span>';}else{$success = '<span class="label label-warning">Processing</span>';	}
			echo "<tr>";
			echo "<td>".$nick."</td>";
			echo "<td>".$success."</td>";
			echo "<td>".gmdate("d/m/Y",$row->tgl_pesan)."</td>";
			echo "<td>Rp.".$this->admin_model->totaltransaksi($row->id)."</td>";
			echo "</tr>";
		}

	}
	function savepembelian($id){
		if(empty($this->input->post('tgl_paid'))){
			$transaksi['tgl_paid'] = "";
		}else{
			$transaksi['tgl_paid'] = strtotime(str_replace('/', '-', $this->input->post('tgl_paid')." 10:20:30"));
		}
		if(empty($this->input->post('tgl_sampai'))){
			$transaksi['tgl_sampai'] = "";
		}else{
			$transaksi['tgl_sampai'] = strtotime(str_replace('/', '-', $this->input->post('tgl_sampai')." 10:20:30"));
		}
		$transaksi['success'] = $this->input->post('success');
		$cek = $this->admin_model->savetransaksi($transaksi,$id);
		if($cek == false){
			redirect(base_url('Admin/detail_pembelian/'.$id.'?act=gagal'));
		}else{
			redirect(base_url('Admin/detail_pembelian/'.$id.'?act=ok'));
		}
	}
	function deleteproductpasok($id){
		$cek = $this->admin_model->deleteproduct($id);
		if($cek == false){
			redirect(base_url('Admin/product?act=gagal'));
		}else{
			$cek = $this->admin_model->deletepasokan($id);
			if($cek == false){
				redirect(base_url('Admin/product?act=gagal'));
			}else{
				redirect(base_url('Admin/product?act=ok'));
			}
		}
	}
	function deleteproduct($id){
		$cek = $this->admin_model->deleteproduct($id);
		if($cek == false){
			redirect(base_url('Admin/product?act=gagal'));
		}else{
			redirect(base_url('Admin/product?act=ok'));
		}
	}
	function adduser(){
		$user['username'] = $this->input->post('username');
		$user['password'] = password_hash($this->input->post('password'),PASSWORD_BCRYPT);
		$user['nickname'] = $this->input->post('nickname');
		$user['email'] = $this->input->post('email');
		$user['telp'] = $this->input->post('telp');
		$user['level'] = $this->input->post('level');
		$user['alamat'] =$this->input->post('alamat');
		$user['kecamatan'] = $this->input->post('kecamatan');
		$user['kota'] =$this->input->post('kota');
		$user['prov'] = $this->input->post('prov');
		$user['postal'] = $this->input->post('postal');
		$cek = $this->admin_model->adduser($user);
		if($cek == false){
			redirect(base_url('Admin/pegawai?act=gagal'));
		}else{
			redirect(base_url('Admin/detail_pegawai/'.$cek.'?act=ok'));
		}
	}
	function deletepegawai($id){
		$cek = $this->admin_model->deletepegawai($id);
		if($cek == false){
			redirect(base_url('Admin/pegawai?act=gagal'));
		}else{
			redirect(base_url('Admin/pegawai?act=ok'));
		}
	}
	
	function savepegawai($id){
		$user['nickname'] = $this->input->post('nickname');
		$user['username'] = $this->input->post('username');
		$user['email'] = $this->input->post('email');
		$user['password'] = $this->input->post('password');
		$user['telp'] = $this->input->post('telp');
		$user['alamat'] =$this->input->post('alamat');
		$user['kecamatan'] = $this->input->post('kecamatan');
		$user['kota'] =$this->input->post('kota');
		$user['prov'] = $this->input->post('prov');
		$user['postal'] = $this->input->post('postal');
		$user['id'] = $id;
		if(empty($user['password'])){
			$cek = $this->admin_model->saveprofilepass($user);
		}else{
			$cek = $this->admin_model->saveprofile($user);
		}
		
		if($cek == false){
			redirect(base_url('Admin/pegawai/'.$id.'?act=gagal'));
		}else{
			redirect(base_url('Admin/pegawai/'.$id.'?act=ok'));
		}
	}
	function saveprofile(){
		$user['nickname'] = $this->input->post('nickname');
		$user['username'] = $this->input->post('username');
		$user['email'] = $this->input->post('email');
		$user['password'] = $this->input->post('password');
		$user['telp'] = $this->input->post('telp');
		$user['id'] = $this->session->userdata('login_id');
		$user['alamat'] =$this->input->post('alamat');
		$user['kecamatan'] = $this->input->post('kecamatan');
		$user['kota'] =$this->input->post('kota');
		$user['prov'] = $this->input->post('prov');
		$user['postal'] = $this->input->post('postal');
		if(empty($user['password'])){
			$cek = $this->admin_model->saveprofilepass($user);
		}else{
			$cek = $this->admin_model->saveprofile($user);
		}
		
		if($cek == false){
			redirect(base_url('Admin/profile?act=gagal'));
		}else{
			redirect(base_url('Admin/profile?act=ok'));
		}
	}
	function getnav(){
		$uid = $this->session->userdata('login_id');
		$nick = $this->admin_model->getnickname($uid);
		$nav = '
		<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
				<div class="top-left-part"><a class="logo" href="dasboard">
				
				<b><img src="'.base_url().'assets/logo2.png" width="50px" alt="home" />
				</b><span class="hidden-xs">ADMINPAGE</span></a></div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Cari..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="#"> <img src="'.base_url().'res/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">'.$nick.'</b> </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
		<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse slimscrollsidebar">
			<ul class="nav" id="side-menu">
				<li style="padding: 10px 0 0;">
					<a href="'.base_url().'admin/dasboard" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
				</li>
				<li>
					<a href="'.base_url().'admin/profile" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Profil</span></a>
				</li>
				';
				$admin = '
				<li>
					<a href="'.base_url().'admin/product" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Produk</span></a>
				</li>
				<li>
					<a href="'.base_url().'admin/addproduct" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Tambah Produk</span></a>
				</li>
				<li>
					<a href="'.base_url().'admin/pegawai" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i><span class="hide-menu">Pegawai</span></a>
				</li>
				<li>
					<a href="'.base_url().'admin/keuangan" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i><span class="hide-menu">Keuangan</span></a>
				</li>
				<li>
					<a href="'.base_url().'admin/pembelian"" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Pembelian</span></a>
				</li>
				';
				$pemasok = '
				<li>
					<a href="'.base_url().'admin/product" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Produk</span></a>
				</li>
				<li>
					<a href="'.base_url().'admin/addproduct" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Tambah Produk</span></a>
				</li>';
				$pegawai = '
				<li>
					<a href="'.base_url().'admin/product" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">Produk</span></a>
				</li>
				<li>
					<a href="'.base_url().'admin/addproduct" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Tambah Produk</span></a>
				</li>
				<li>
					<a href="'.base_url().'admin/pembelian"" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Pembelian</span></a>
				</li>
				';
				$owner = '
				<li>
					<a href="'.base_url().'admin/keuangan" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i><span class="hide-menu">Keuangan</span></a>
				</li>';
				$keuangan = '
				<li>
					<a href="'.base_url().'admin/pembelian"" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Pembelian</span></a>
				</li>';
				$footer='<li>
				<a href="'.base_url("admin/logout").'" class="waves-effect"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i><span class="hide-menu">Keluar</span></a></li></ul></div></div>';
		if($this->session->userdata('login_level')==5){
			$totalnav = $nav . $owner . $footer;
		}
		if($this->session->userdata('login_level')==4){
			$totalnav = $nav . $admin . $footer;
		}
		if($this->session->userdata('login_level')==3){
			$totalnav = $nav . $pegawai . $footer;
		}
		if($this->session->userdata('login_level')==2){
			$totalnav = $nav . $keuangan . $footer;
		}
		if($this->session->userdata('login_level')==1){
			$totalnav = $nav . $pemasok . $footer;
		}
		return  array('getnav' => $totalnav);
	}
	function checkpermission($page){
		$level = $this->session->userdata('login_level');
		if($page=="pegawai" AND $level!=4){return false;}
		if($page=="detail_pegawai" AND $level!=4){return false;}
		if($page=="keuangan" AND $level<4){return false;}
		//if($page=="pembelian" AND ($level!=4 OR $level!=2)){return false;}
		return true;
	}
}
