<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Store_model extends CI_Model{	
    
    public function getimageurl($id){
        $this->db->select(array('p.id', 'p.url'));
        $this->db->from('picture p');  
        $this->db->where('p.id',$id);     
        $query = $this->db->get();
       return $query->row_array()['url'];
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
    function getbarangtransaksi($id){
        $query = $this->db->query("SELECT * from pembelian WHERE id_transaksi='$id'");
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query;
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
    function addpembelian($data){
        //$data = array("id_user"=>$uid,"success"=>"0","tgl_pesan"=>time(),"tgl_pesan"=>"","tgl_pesan"=>"");
        $query = $this->db->insert("pembelian",$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    function addtransaksi($data){
        $query = $this->db->insert("transaksi",$data);
        $insertId = $this->db->insert_id();
        if($query){
            return $insertId;
        }else{
            return false;
        }
    }
    function getproductlist($jenis){		
        $query = $this->db->query("SELECT * from product WHERE jenis_barang='$jenis'");
        if($query->num_rows()==0){
            $result = $query;
            return $result->result();
        }else{
            $result = $query;
            return $result->result();
        }
    }
    function getproductlistall($jenis){		
        $query = $this->db->query("SELECT * from product WHERE jenis_barang='$jenis'");
        if($query->num_rows()==0){
            $result = $query;
            return $result->result();
        }else{
            $result = $query;
            return $result->result();
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
    function getmytransaksi($uid){		
        $query = $this->db->query("SELECT * from transaksi WHERE id_user='$uid'");
        if($query->num_rows()==0){
            $result = $query;
            return $result;
        }else{
            $result = $query;
            return $result;
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
	function cek_login($login){		
        $query = $this->db->get_where('account',array('username'=>$login['username']));
        if($query->num_rows()==0){
            return false;
        }else{
            $result = $query->row_array();
            if(password_verify($login['password'],$result['password'])){
                return $result;
            }else{
                return false;
            }

        }
    }	
    
}