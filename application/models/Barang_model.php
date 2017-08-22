<?php

class Barang_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->db->get('barang');
    }

    public function index_paging($page, $limiter)
    {
        return $this->db->query("SELECT * FROM barang LIMIT $page, $limiter");
    }

    public function get()
    {
        $query = "SELECT
                    barang.*,
                    kategori.id as id_tipe,
                    kategori.nama as jenis,
                    price.price as price,
                    per_price.per_price as per_price,
                    qty.qty as qty,
                    sub.nama as sub_jenis
                FROM
                    barang AS barang,
                    barang_kategori AS kategori,
                    barang_price AS price,
                    barang_per_price AS per_price,
                    barang_quantity AS qty,
                    barang_sub_kategori AS sub
                WHERE
                    barang.kategori_id = kategori.id
                AND
                    price.barang_id = barang.id
                AND
                    per_price.barang_id = barang.id
                AND
                    qty.barang_id = barang.id
                AND
                    barang.sub_kategori_id = sub.id
                ORDER BY
                    barang.id
                DESC";
        return $this->db->query($query);
    }

    public function find($id)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('barang.id', $id);
        $this->db->join('barang_per_price', 'barang_per_price.barang_id = barang.id');
        return $this->db->get();
    }

    public function everything()
    {
        return $this->db->get('barang');
    }

    public function getAll()
    {
        $query = "SELECT
                    barang.*
                FROM
                    barang AS barang
                ORDER BY
                    barang.id
                DESC";
        return $this->db->query($query);
    }

    public function getOver()
    {
        return $this->db->get('barang');
    }

    public function getAllKategori()
    {
        return $this->db->get('barang_kategori');
    }

    public function getAllSubKategori()
    {
        return $this->db->get('barang_sub_kategori');
    }

    public function getOne($barang_id)
    {
        $query = "SELECT
                    br.*
                FROM
                    barang AS br
                WHERE
                    br.id = $barang_id
                ORDER BY
                    br.id
                DESC";
        return $this->db->query($query);
    }
}