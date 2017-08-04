<?php

class Barang_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = "SELECT
                    barang.*,
                    kategori.id as id_tipe,
                    kategori.nama as jenis
                FROM
                    barang AS barang,
                    barang_kategori AS kategori
                WHERE
                    barang.kategori_id = kategori.id
                ORDER BY
                    barang.id
                DESC";
        return $this->db->query($query);
    }

    public function getOver()
    {
        return $this->db->get('barang');
    }

    public function getAllTipe()
    {
        return $this->db->get('barang_tipe');
    }

    public function getOne($barang_id)
    {
        $query = "SELECT
                    br.*,
                    tp.id as id_tipe,
                    tp.nama as jenis
                FROM
                    barang AS br,
                    barang_tipe AS tp
                WHERE
                    br.tipe_id = tp.id
                AND
                    br.id = $barang_id
                ORDER BY
                    br.id
                DESC";
        return $this->db->query($query);
    }
}