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

        $data_row_array = $query->row_array();

        $this->session->set_userdata([
            'kategori_id' => $data_row_array['kategori_id'],
            'user_id' => $data_row_array['id']
        ]);

        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}

