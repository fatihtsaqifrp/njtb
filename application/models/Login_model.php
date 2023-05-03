<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{	
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
    function register($register){
        $query = $this->db->get_where('account',array('username'=>$register['username'],'email'=>$register['email']));
        if($query->num_rows()==0){
            $data['username'] = $register['username'];
            $data['password'] = password_hash($register['password'],PASSWORD_BCRYPT);
            $data['nickname'] = $register['username'];
            $data['email'] = $register['email'];
            $data['telp'] = "";
            $data['level'] = 0;
            $data['alamat'] =$register['alamat'];
            $data['kecamatan'] = $register['kecamatan'];
            $data['kota'] =$register['kota'];
            $data['prov'] = $register['prov'];
            $data['postal'] = $register['postal'];
            $hasil = $query = $this->db->insert("account",$data);
            return true;
        }else{
            return false;
        }
    }	
}