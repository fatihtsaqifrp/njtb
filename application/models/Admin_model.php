<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model{	
    function getdasboardinfo(){
        $clients = $this->db->query("SELECT * from account WHERE level='0'")->num_rows();
        $items = $this->db->query("SELECT * from product")->num_rows();
        $transaksi = $this->db->query("SELECT * from transaksi")->num_rows();
        $info['clients']=$clients;
        $info['items']=$items;
        $info['transaksi']=$transaksi;
        return $info;
    }
    function totaltransaksi($id){
        $hasil = $this->db->query("SELECT SUM(harga_barang * jumlah_barang) as 'hasil' FROM pembelian WHERE id_transaksi='$id'")->row_array()['hasil'];
        return $hasil;
    }
	function getprofile($uid){		
        $query = $this->db->get_where('account',array('id'=>$uid));
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->row_array();
            return $result;
        }
    }	
    function getnickname($uid){		
        $query = $this->db->get_where('account',array('id'=>$uid));
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->row_array();
            return $result['nickname'];
        }
    }
    function getbarangimg($id){
        $query = $this->db->query("SELECT * from product WHERE id='$id'");
        if($query->num_rows()==0){
            return 0;
        }else{
            return $query->row_array()['id_pic'];
        }

    }
    function getproductlistbyuser($uid){
        $query = $this->db->query("SELECT * from pemasok WHERE id_user='$uid'");
        if($query->num_rows()==0){
            return false;
        }else{
            $loop=0;
            foreach ($query->result() as $row){
            $idbarang = $row->id_barang;
            $query1[$loop] = $this->db->query("SELECT * from product WHERE id='$idbarang'")->row_array();
            $loop++;
            }
            if($query1){
                $result = $query1;
                return $result;
            }else{
                return false;
            }
        }
    }
    function getproductlist(){		
        $query = $this->db->query("SELECT * from product");
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query;
            return $result;
        }
    }

    function getpegawailist(){		
        $query = $this->db->query("SELECT * from account WHERE level='3'");
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query;
            return $result;
        }
    }
    function getpemasoklist(){		
        $query = $this->db->query("SELECT * from account WHERE level='1'");
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query;
            return $result;
        }
    }
    function getuserslist(){		
        $query = $this->db->query("SELECT * from account WHERE level='0'");
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query;
            return $result;
        }
    }
    function getpembelianlist(){		
        $query = $this->db->query("SELECT * from transaksi ORDER BY success ASC");
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query;
            return $result;
        }
    }
    function getpembeliandata($id){		
        $query = $this->db->query("SELECT * from transaksi WHERE id='$id' LIMIT 1");
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->row_array();
            return $result;
        }
    }
    function savetransaksi($transaksi,$id){
        $this->db->where('id',$id);
        $result =  $this->db->update('transaksi', $transaksi);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    function getbarangtransaksi($id){
        $query = $this->db->query("SELECT * from pembelian WHERE id_transaksi='$id'");
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query;
            return $result;
        }
    }
    function getpegawaidata($id){		
        $query = $this->db->query("SELECT * from account WHERE id='$id'");
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->row_array();
            return $result;
        }
    }
    function getproductdata($id){		
        $query = $this->db->query("SELECT * from product WHERE id='$id'");
        
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->row_array();
            return $result;
        }
    }
    function saveproduct($data,$id){
        $this->db->where('id',$id);
        $result =  $this->db->update('product', $data);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    function deletepegawai($id){
        $result = $this->db->delete('account', array('id' => $id)); 
        if($result){
            return true;
        }else{
            return false;
        }
    }
    function deleteproduct($id){
        $result = $this->db->delete('product', array('id' => $id)); 
        if($result){
            return true;
        }else{
            return false;
        }
    }
    function deletepasokan($id){
        $result = $this->db->delete('pemasok', array('id_barang' => $id)); 
        if($result){
            return true;
        }else{
            return false;
        }
    }
    function adduser($data){
        $query = $this->db->insert("account",$data);
        $insertId = $this->db->insert_id();
        if($query){
            return $insertId;
        }else{
            return false;
        }
    }
    function addpemasok($data){
        $query = $this->db->insert("pemasok",$data);
        $insertId = $this->db->insert_id();
        if($query){
            return $insertId;
        }else{
            return false;
        }
    }
    function addproduct($data){
        $query = $this->db->insert("product",$data);
        $insertId = $this->db->insert_id();
        if($query){
            return $insertId;
        }else{
            return false;
        }
    }
    function saveprofilepass($data){
        $datax = array(
            'username' => $data['username'],
            'email' => $data['email'],
            'nickname' => $data['nickname'],
            'telp' => $data['telp'],
            'alamat' => $data['alamat'],
            'kecamatan' => $data['kecamatan'],
            'kota' => $data['kota'],
            'prov' => $data['prov'],
            'postal' => $data['postal'],
        );
        $this->db->where('id', $data["id"]);
        $result =  $this->db->update('account', $datax);
        return $result;
    }
    function saveprofile($data){
        $datax = array(
            'username' => $data['username'],
            'password' => password_hash($data['password'],PASSWORD_BCRYPT),
            'email' => $data['email'],
            'nickname' => $data['nickname'],
            'telp' => $data['telp'],
            'alamat' => $data['alamat'],
            'kecamatan' => $data['kecamatan'],
            'kota' => $data['kota'],
            'prov' => $data['prov'],
            'postal' => $data['postal'],
        );
        $this->db->where('id', $data["id"]);
        $result =  $this->db->update('account', $datax);
        return $result;
    }
}