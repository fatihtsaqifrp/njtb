<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('store_model');
	}
	public function index()
	{
        $param['jacket'] =  $this->changepicidtopicurl( $this->store_model->getproductlist(1));
        $param['shirt'] =  $this->changepicidtopicurl($this->store_model->getproductlist(2));
        $param['sweater'] = $this->changepicidtopicurl( $this->store_model->getproductlist(3));
        $param['nav'] = $this->donelogin();
        $this->load->view('Store/store_view',$param);
    }
    function detail($id){
        $param['data'] =  $this->store_model->getproductdata($id);
        $param['data']['pic'] = $this->store_model->getimageurl($param['data']['id_pic']);
        $param['nav'] = $this->donelogin();
        $this->load->view('Store/detail_view',$param);
    }
    function all($id){
        if($id=="jaket"){
            $param['data'] =  $this->changepicidtopicurl($this->store_model->getproductlistall(1));
        }
        if($id=="shirt"){
            $param['data'] = $this->changepicidtopicurl($this->store_model->getproductlistall(2));
        }
        if($id=="sweater"){
            $param['data'] =  $this->changepicidtopicurl($this->store_model->getproductlistall(3));
        }
        $param['nav'] = $this->donelogin();
        $this->load->view('Store/all_view',$param);
    }
    function changepicidtopicurl($data){
        $loop=0;
        foreach ($data as $row)
        {
    $hasil[$loop]['id']=$row->id;
    $hasil[$loop]['pic']=$this->store_model->getimageurl($row->id_pic);
    $hasil[$loop]['harga_barang']=$row->harga_barang;
    $hasil[$loop]['nama_barang']=$row->nama_barang;
    $hasil[$loop]['stok_barang']=$row->stok_barang;
    $loop++;
    }
    return $hasil;
    }
    function checkout(){
       
    }
    function cart(){
        $param['data'] =  $this->store_model->getproductlist();
        $this->load->view('Store/cart_view',$param);
    }
    function addtocart($id){
        //$cart = array();
        $cart['cart'] = $this->session->userdata('cart');
        $new_cart = array(
            'id_barang' => $id,
            'jumlah_barang' => 1
            );
        if($cart['cart'][$id]['id_barang']==$id){
            $stok =  $this->store_model->getproductdata($id)['stok_barang'];
            if($cart['cart'][$id]['jumlah_barang']<$stok){
            $cart['cart'][$id]['jumlah_barang']=$cart['cart'][$id]['jumlah_barang']+1;
            }
        }else{
            $cart['cart'][$id]=$new_cart;
        }
        $this->session->set_userdata($cart);
        print_r($cart);
        die();
    }
    function tambahcart($id){
        //$cart = array();
        $cart['cart'] = $this->session->userdata('cart');
        $stok =  $this->store_model->getproductdata($id)['stok_barang'];
        if($cart['cart'][$id]['jumlah_barang']<$stok){
            $cart['cart'][$id]['jumlah_barang']=$cart['cart'][$id]['jumlah_barang']+1;
        }
        $this->session->set_userdata($cart);
        die(1);
    }
    function kurangcart($id){
        //$cart = array();
        $cart['cart'] = $this->session->userdata('cart');
        if($cart['cart'][$id]['jumlah_barang']!=1){
        $cart['cart'][$id]['jumlah_barang']=$cart['cart'][$id]['jumlah_barang']-1;
        }
        $this->session->set_userdata($cart);
        die(1);
    }
    function deletefromcart($id){
        //$cart = array();
        $cart['cart'] = $this->session->userdata('cart');
        unset($cart['cart'][$id]);
        $this->session->set_userdata($cart);
        die(1);
    }
    function countcart(){
        $cart['cart'] = $this->session->userdata('cart');
        die(count($cart['cart'])."");
    }
 
    function seecart(){
        $cart = $this->session->userdata('cart');
       
        echo '<div class="table-responsive">
        <table class="table">
        <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Jumlah Barang</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>';
            $totalharga = 0;
            $loop=0;
            if(empty($cart)){
            echo "<tr><Td colspan='5'><center>Tidak ada Barang Di Keranjang</center></td></tr>";  
            }else{
            foreach ($cart as $row)
            {
               
                $databarang = $this->store_model->getproductdata($row['id_barang']);
                echo '<tr>';
                echo '<td>'.$databarang['nama_barang'].'</td>';
                echo '<td>'.$databarang['harga_barang'].'</td>';
                echo '<td>
                <button type="button" onclick="kurangcart(\''.$row['id_barang'].'\');" class="btn btn-danger btn-sm">-</button>
                '.$row['jumlah_barang'].'
                <button type="button" onclick="tambahcart(\''.$row['id_barang'].'\');" class="btn btn-primary btn-sm">+</button>
                </td>';
                echo '<td>Rp.'.($databarang['harga_barang'] * $row['jumlah_barang']).'</td>';
                echo '<td><button type="button" onclick="deletecart(\''.$row['id_barang'].'\');" class="btn btn-primary btn-sm">X</button></td>';
                echo '</tr>';
                $loop++;
                $totalharga = $totalharga + ($databarang['harga_barang'] * $row['jumlah_barang']);
            }}
        echo '<tr><td></td><td></td><td align="right">Total:</td><td>Rp.'.$totalharga.'</td></tr></tbody></table></div>';
        
       
    }
    function loginshow(){

        echo '<form accept-charset="UTF-8" role="form" method="POST" action="'.base_url("auth/gologin").'">
            <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="Username" name="username" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
                <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox" value="Remember Me"> Ingat Saya
                    </label>
                </div>
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Masuk">
                <hr>
                <a href="#" onclick="registermodal();">Tidak Punya Akun?</a>
            </fieldset>
              </form>';
    }
    function registershow(){
        //die("<center><h1>SEDANG MAINTENANCE</h1></center>");
        echo '<form accept-charset="UTF-8" role="form" method="POST" action="'.base_url("auth/goregister").'">
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="Username" name="username" type="text">
                </div>
                <div class="form-group">
                <input class="form-control" placeholder="E-mail" name="email" type="email">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Alamat Lengkap" name="alamat" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Kecamatan" name="kec" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Kab/Kota" name="kota" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Provinsi" name="prov" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Kode Pos" name="postal" type="text">
                </div>
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Daftar">
                <hr>
                <a href="#" onclick="loginmodal();">Punya Akun?</a>
            </fieldset>
              </form>';
    }
	function seeimage($id){
        $imgpath =  $this->store_model->getimageurl($id);
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
        imagedestroy($img);
   }
   function infobeli(){
    if($this->session->has_userdata("login_ok")){
        $cart['cart'] = $this->session->userdata('cart');
        if(empty($cart['cart'])){
        die("<center><h2>Maaf!, Keranjang Kosong</h2></center>");
        }else{
        $totalharga= 0;
        $uid = $this->session->userdata('login_id');
        $waktu = time();
        $dataaa = array(
            "id_user"=>$uid,
            "success"=>"0",
            "tgl_pesan"=>"$waktu",
            "tgl_paid"=>"",
            "tgl_sampai"=>"");
        $idtransaksi = $this->store_model->addtransaksi($dataaa);
        foreach ($cart['cart'] as $row)
        {
            $databarang = $this->store_model->getproductdata($row['id_barang']);
            $datax = array(
                "id_transaksi"=>$idtransaksi,
                "id_barang"=>$row['id_barang'],
                "nama_barang"=>$databarang['nama_barang'],
                "harga_barang"=>$databarang['harga_barang'],
                "jumlah_barang"=>$row['jumlah_barang'],
                "tgl"=>time());
            $this->store_model->addpembelian($datax);
            
        }
        $this->session->unset_userdata('cart');
        echo "
        *****<Br>
        <h2>PEMBAYARAN</h2>
        1. Transfer dapat dilakukan ke rekening ACB123469875 an Marco Fleksi
        <Br><Br>
        2. Konfirmasi pembayaran anda dengan mengirimkan bukti transfer ke <a href='mailto:111201710803@mhs.dinus.ac.id'>111201710803@mhs.dinus.ac.id</a>
        <Br><Br>
        3. Bukti pembayaran yang sudah dikirimkan akan diverifikasi dalam 1x24 jam dan anda akan menerima invoice sebagai bukti pembayaran
        <br>
        *****";
    }
    }else{
        die("0");
        //$urlnya = strtok($_SERVER['HTTP_REFERER'], '?');
        //redirect($urlnya."?act=login");
    }
   }
   function profile(){
    if ($this->session->userdata['login_ok'] != true OR $this->session->userdata('login_level')!=0)
    {
        redirect(base_url("Auth"));
    }
    $uid = $this->session->userdata('login_id');
    $data = $this->store_model->getprofile($uid);
    $nav["data"]=$data;
    $nav['nav'] = $this->donelogin();
    $this->load->view('Store/profile',$nav);
}
function product(){
    if ($this->session->userdata['login_ok'] != true OR $this->session->userdata('login_level')!=0)
    {
        redirect(base_url("auth"));
    }
    $uid = $this->session->userdata('login_id');
    $nav = $this->donelogin();
    $data = $this->store_model->getmytransaksi($uid);
    $loop = 1;
    $pembelian[$loop]['']="";
    foreach ($data->result() as $row)
    {
        $pembelian[$loop]['id_user']=$row->id_user;
        $pembelian[$loop]['id']=$row->id;
        $nick = $this->store_model->getnickname($row->id_user);
        $pembelian[$loop]['username']=$nick;
        $pembelian[$loop]['success']=$row->success;
        //if($row->success){$success = '<span class="label label-success">Success</span>';}else{$success = '<span class="label label-warning">Processing</span>';	}
        if($row->success==1){$success = '<span class="label label-success">Success</span>';}
		if($row->success==0){$success = '<span class="label label-warning">Processing</span>';	}
		if($row->success==2){$success = '<span class="label label-danger">Canceled</span>';	}
        $pembelian[$loop]['successkah']=$success;
        $pembelian[$loop]['tgl_pesan']=$row->tgl_pesan;
        $pembelian[$loop]['tgl_paid']=$row->tgl_paid;
        $pembelian[$loop]['tgl_sampai']=$row->tgl_sampai;
        $loop++;
    }
    $param['data'] = $pembelian;
    $param['nav'] = $this->donelogin();
    $this->load->view('Store/product',$param);
}
function lihatbarang(){
    
    $idbarang = $this->input->post('id');
    $barang = $this->store_model->getbarangtransaksi($idbarang);
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
function recenttransaction(){
    $uid = $this->session->userdata('login_id');
    $transaksi = $this->store_model->getpembelianlist($uid);
    $loop = 1;
    foreach ($transaksi->result() as $row)
    {
        $nick = $this->store_model->getnickname($row->id_user);
        if($row->success){$success = '<span class="label label-success">Success</span>';}else{$success = '<span class="label label-warning">Processing</span>';	}
        echo "<tr>";
        echo "<td>".$nick."</td>";
        echo "<td>".$success."</td>";
        echo "<td>".gmdate("d/m/Y",$row->tgl_pesan)."</td>";
        echo "<td>Rp.".$this->store_model->totaltransaksi($row->id)."</td>";
        echo "</tr>";
    }

}
function saveprofile(){
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
    $user['id'] = $this->session->userdata('login_id');
    if(empty($user['password'])){
        $cek = $this->store_model->saveprofile($user);
    }else{
        $cek = $this->store_model->saveprofilepass($user);
    }
    
    if($cek == false){
        redirect(base_url('store/profile?act=gagal'));
    }else{
        redirect(base_url('store/profile?act=ok'));
    }
}

function logout(){
    $this->session->sess_destroy();
    redirect(base_url('store'));
}
   function donelogin(){
    if($this->session->has_userdata("login_ok")){
	$level_login = $this->session->userdata('login_level');
    if($level_login==0){$hai="USER";}
    if($level_login==1){$hai="PEMASOK";}
    if($level_login==2){$hai="KEUANGAN";}
    if($level_login==3){$hai="PEGAWAI";}
    if($level_login==4){$hai="ADMIN";}
    if($level_login==5){$hai="OWNER";}
    if(empty($hai)){$hai="USER";}
    $uid = $this->session->userdata('login_id');
    $nick = strtoupper($this->store_model->getnickname($uid));
    $menu = "<li><a href='". base_url("store/profile")."'>".strtoupper("PROFIL")."</a></li>
    <li><a href='". base_url("Store/product")."'>".strtoupper("PRODUKKU")."</a></li>
    ";
    return $menu."<li><a href='". base_url("store/logout")."'>".strtoupper("KELUAR") . "($nick)</a></li>";
    }else{
    return "<li><a onclick='loginmodal()' href='#'>".strtoupper("MASUK")."</a></li>";    
    }
    }
}
