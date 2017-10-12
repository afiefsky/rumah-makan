<?php

class Penjualan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index_paging($page, $limiter)
    {
        $query = "SELECT
                    penjualan.*, pengguna.nama_depan, pengguna.nama_belakang, menu.harga as per_price, detail.qty
                FROM
                    penjualan as penjualan, pengguna as pengguna, penjualan_detail as detail, menu as menu
                WHERE
                    penjualan.user_id = pengguna.id
                AND
                    detail.penjualan_id = penjualan.id
                AND
                    detail.menu_id = menu.id
                ORDER BY
                    penjualan.id DESC
                LIMIT $page, $limiter";
        return $this->db->query($query);
    }

    public function create($data)
    {
        $this->db->insert('penjualan', $data);

        return 1;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('penjualan', $data);

        return 1;
    }

    public function cetak($id)
    {
        $query = "SELECT
                    detail.id,
                    menu.nama AS barang_name,
                    detail.qty,
                    menu.harga AS price
                FROM
                    penjualan_detail AS detail,
                    penjualan AS penjualan,
                    menu AS menu
                WHERE
                    detail.penjualan_id = penjualan.id
                AND
                    detail.menu_id = menu.id
                AND
                    detail.penjualan_id = $id";
        return $this->db->query($query);
    }

    public function laporan()
    {
        $query = "SELECT
                    detail.id,
                    barang.nama AS barang_name,
                    detail.qty,
                    price.price AS price
                FROM
                    penjualan_detail AS detail,
                    penjualan AS penjualan,
                    barang AS barang,
                    barang_price AS price
                WHERE
                    price.barang_id = barang.id
                AND
                    detail.penjualan_id = penjualan.id
                AND
                    detail.barang_id = barang.id";
        return $this->db->query($query);
    }

    public function get()
    {
        $this->db->select('penjualan.*, pengguna.nama_depan, pengguna.nama_belakang, menu.harga as per_price, detail.qty');
        $this->db->from('penjualan as penjualan, pengguna as pengguna, penjualan_detail as detail, menu as menu');
        $this->db->where('penjualan.user_id = pengguna.id');
        $this->db->where('detail.penjualan_id = penjualan.id');
        $this->db->where('detail.menu_id = menu.id');
        $this->db->order_by('penjualan.id', 'DESC');
        return $this->db->get();
    }

    public function getById($id)
    {
        $this->db->select('detail.*, pengguna.nama_depan, pengguna.nama_belakang, menu.harga, detail.qty, menu.nama');
        $this->db->from('penjualan as penjualan, pengguna as pengguna, penjualan_detail as detail, menu as menu');
        $this->db->where('penjualan.user_id = pengguna.id');
        $this->db->where('detail.penjualan_id = penjualan.id');
        $this->db->where('detail.menu_id = menu.id');
        $this->db->where('detail.penjualan_id = ', $id);
        $this->db->order_by('penjualan.id', 'DESC');
        return $this->db->get();
    }

    public function find($param, $keyword)
    {
        return $this->db->get_where('penjualan', [$param => $keyword]);
    }

    public function max()
    {
        $this->db->select_max('id', 'max');
        return $this->db->get('penjualan');
    }

    public function all($penjualan_id)
    {
        $this->db->select('
            menu.nama,
            menu.harga as per_price,
            detail.qty,
            (menu.harga * detail.qty) as subtotal
        ');
        $this->db->from('penjualan_detail as detail, menu as menu');
        $this->db->where('detail.menu_id = menu.id');
        $this->db->where('detail.penjualan_id = ', $penjualan_id);
        return $this->db->get();
    }
}