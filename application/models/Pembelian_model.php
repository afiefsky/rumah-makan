<?php

class Pembelian_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $query = "SELECT
                    pb.*,
                    pg.nama_depan,
                    pg.nama_belakang
                FROM
                    pembelian AS pb,
                    pengguna AS pg
                WHERE
                    pb.user_id = pg.id
                ORDER BY pg.id
                DESC";

        return $this->db->query($query);
    }

    public function getAllByPembelianId($pembelian_id)
    {
        $query = "SELECT
                    detail.id,
                    detail.pembelian_id,
                    barang.nama,
                    detail.qty,
                    price.price
                FROM
                    pembelian_detail AS detail,
                    barang AS barang,
                    barang_price AS price
                WHERE
                    detail.barang_id = barang.id
                AND
                    price.barang_id = barang.id
                AND
                    detail.deleted_at IS NULL
                AND
                    detail.is_done = '0'";

        return $this->db->query($query);
    }
}
