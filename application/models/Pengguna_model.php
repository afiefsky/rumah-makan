<?php
class Pengguna_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
    }

    public function login($username, $password)
    {
        $query = $this->db->get_where('pengguna', [
            'username'=>$username,
            'password'=>md5($password)
        ]);

        $this->session->set_userdata([
            'tipe_id' => $query->row_array()['tipe_id'],
            'user_id' => $query->row_array()['id']
        ]);

        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}

