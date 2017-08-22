<?php

class Barang_quantity_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function update($barang_id, $qty)
    {
        $query = "UPDATE barang_stock SET stock = stock - $qty WHERE barang_id = $barang_id";

        $quantity = $this->db->query($query);

        if ($quantity) {
            return 1;
        } else {
            return 0;
        }
    }
}