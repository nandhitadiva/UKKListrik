<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

    public function cek_login(){
        $query = $this->db->join('level','level.id_level=admin.id_level')
                          ->where('username',$this->input->post('username'))
                          ->where('password',$this->input->post('password'))
                          ->get('admin');

        if($this->db->affected_rows() > 0){

            $data_login = $query->row();
            $data_session = array(
                                'id_admin'=>$data_login->id_admin,
                                'username'=> $data_login->username,
                                'password'=> $data_login->password,
                                'login'=> TRUE,
                                'nama_level'=> $data_login->nama_level
            );
            $this->session->set_userdata($data_session);
            return TRUE;

        }else{
            return FALSE;
        }
    }

	
}