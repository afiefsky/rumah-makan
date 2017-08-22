<?php

class SubKategori_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = "SELECT
                    *
                FROM
                    barang_sub_kategori";
        return $this->db->query($query);
    }

    public function getOne($id)
    {
        $query = "SELECT
                    *
                FROM
                    barang_sub_kategori
                WHERE
                    id = $id";
        return $this->db->query($query);
    }    
}