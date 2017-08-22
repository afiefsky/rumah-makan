<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        /* Initialize this constructor */
        parent::__construct();

        /* Load the model */
        $this->load->model(['Penjualan_model', 'Barang_model', 'Barang_quantity_model']);

        /* Redeclare the model for development purpose */
        $this->penjualan = $this->Penjualan_model;
    }

    public function penjualan()
    {
        $data['record'] = $this->penjualan->get();

        $this->template->load('template/kasir_template', 'laporan/penjualan/index', $data);
    }
}