<?php

class Pembelian_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cetak($id)
    {
        $query = "SELECT
                    detail.id,
                    barang.nama AS barang_name,
                    detail.qty,
                    barang.harga_per_kilo AS price
                FROM
                    pembelian_detail AS detail,
                    pembelian AS pembelian,
                    barang AS barang
                WHERE
                    detail.pembelian_id = pembelian.id
                AND
                    detail.barang_id = barang.id
                AND
                    detail.pembelian_id = $id";
        return $this->db->query($query);
    }

    public function getAll()
    {
        $query = "SELECT
                    pb.*,
                    pg.nama_depan,
                    pg.nama_belakang
                FROM
                    pembelian AS pb,
                    pengguna AS pg,
                    pembelian_detail AS pd
                WHERE
                    pb.user_id = pg.id
                AND
                    pd.pembelian_id = pb.id
                ORDER BY pg.id
                DESC";

        return $this->db->query($query);
    }

    public function getAllPembelian()
    {
        /* ORDER BY PEMBELIAN ID */
        $query = "SELECT
                    pb.*,
                    DATE_FORMAT(pb.created_at, '%d-%m-%Y') AS seldate,
                    DATE_FORMAT(pb.created_at, '%H:%i') AS seltime,
                    pg.nama_depan,
                    pg.nama_belakang,
                    sum(pd.qty * barang.harga_per_kilo) as total
                FROM
                    pembelian AS pb,
                    pengguna AS pg,
                    pembelian_detail AS pd,
                    barang AS barang
                WHERE
                    pb.user_id = pg.id
                AND
                    pd.pembelian_id = pb.id
                AND
                    pd.barang_id = barang.id
                GROUP BY
                    pb.id
                ORDER BY pb.id
                DESC";

        return $this->db->query($query);
    }

    public function getDetail($pembelian_id)
    {
        /* ORDER BY PEMBELIAN ID */
        $query = "SELECT
                    pb.*,
                    pg.nama_depan,
                    pg.nama_belakang,
                    barang.*,
                    pd.*,
                    barang.harga_per_kilo AS price
                FROM
                    pembelian AS pb,
                    pengguna AS pg,
                    pembelian_detail AS pd,
                    barang AS barang
                WHERE
                    pb.user_id = pg.id
                AND
                    pd.pembelian_id = pb.id
                AND
                    pd.barang_id = barang.id
                AND
                    pd.pembelian_id = $pembelian_id
                ORDER BY pb.id
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
                    barang.harga_per_kilo as price
                FROM
                    pembelian_detail AS detail,
                    barang AS barang
                WHERE
                    detail.barang_id = barang.id
                AND
                    detail.deleted_at IS NULL
                AND
                    detail.is_done = '0'";

        return $this->db->query($query);
    }

    public function laporan()
    {
        $query = "SELECT
                    pengguna.nama_depan,
                    pengguna.nama_belakang,
                    pembelian.created_at,
                    (price.price * detail.qty) AS total
                FROM
                    pembelian AS pembelian,
                    pembelian_detail AS detail,
                    barang_price AS price,
                    barang AS barang,
                    pengguna AS pengguna
                WHERE
                    detail.pembelian_id = pembelian.id
                AND
                    price.barang_id = barang.id
                AND
                    detail.barang_id = barang.id
                AND
                    pembelian.user_id = pengguna.id";
        return $this->db->query($query);
    }

    public function collectedIndex()
    {
        $this->db->select('barang.*, per_price.per_price');
        $this->db->from('barang as barang,
            barang_per_price as per_price');
        $this->db->where('per_price.barang_id = barang.id');
        return $this->db->get();
    }

    public function collectedGet($id)
    {
        $this->db->select('barang.*, per_price.per_price');
        $this->db->from('barang as barang,
            barang_per_price as per_price');
        $this->db->where('per_price.barang_id = barang.id');
        $this->db->where('per_price.barang_id = barang.id');
        $this->db->where('barang.id = ', $id);
        return $this->db->get();
    }

    public function getAllDetail()
    {
        $query = "SELECT
                    barang.*,
                    sub.nama AS sub_jenis,
                    per_price.per_price AS per_price,
                    (detail.qty * qty.qty) AS qty
                FROM
                    pembelian_detail AS detail,
                    barang AS barang,
                    barang_kategori AS kategori,
                    barang_sub_kategori AS sub,
                    barang_per_price AS per_price,
                    barang_quantity AS qty
                WHERE
                    detail.barang_id = barang.id
                AND
                    barang.kategori_id = kategori.id
                AND
                    barang.sub_kategori_id = sub.id
                AND
                    per_price.barang_id = barang.id
                AND
                    qty.barang_id = barang.id";

        return $this->db->query($query);
    }
}
