<?php
class Pembelian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Pembelian_model', 'Barang_model']);
        $this->pembelian = $this->Pembelian_model;
        $this->barang = $this->Barang_model;
    }

    public function index()
    {
        $data['record'] = $this->pembelian->getAll();

        $this->template->load('template/admin_template', 'pembelian/index', $data);
    }

    public function add()
    {
        if ($this->session->userdata('pembelian_id') !== null) {
            $pembelian_id = $this->session->userdata('pembelian_id');
        } else {
            $pembelian_id = 0;
        }

        $data['pembelian_id'] = $pembelian_id;
        $data['select_pembelian'] = $this->pembelian->getAllByPembelianId($pembelian_id);

        if (isset($_POST['submit_check'])) {
            $count = $this->db->query("SELECT count(*) AS count FROM pembelian")->row_array();

            $pembelian_id = $count['count'] + 1;

            /* Set pembelian_id session */
            $this->session->set_userdata('pembelian_id', $pembelian_id);

            $barang_id = $this->input->post('barang_id');
            $qty = $this->input->post('qty');

            $data['button'] = 1;
            $data['qty'] = $qty;

            /* Get all barang */
            $data['barang'] = $this->barang->getAll();

            /* Get data barang from id */
            $data['selected_barang'] = $this->db->get_where('barang', ['id' => $barang_id])->row_array();

            /* Get barang price from id */
            $data['barang_price'] = $this->db->get_where('barang_price', ['barang_id' => $barang_id])->row_array();

            $data['harga_per_kilo'] = $data['barang_price']['price'];

            $data['harga_total'] = $data['barang_price']['price'] * $qty;
            // $laba = $this->input->post('laba');
            
            $this->template->load('template/admin_template', 'pembelian/add', $data);
        } elseif (isset($_POST['submit_keranjang'])) {
            $pembelian_id   = $this->session->userdata('pembelian_id');
            $barang_id      = $this->input->post('barang_id');
            $qty            = $this->input->post('qty');
            
            $data_pembelian = [
                'user_id' => $this->session->userdata('user_id')
            ];

            $data_pembelian_detail = [
                'pembelian_id'  => $pembelian_id,
                'barang_id'     => $barang_id,
                'qty'           => $qty
            ];

            // $this->db->insert('pembelian', $data_pembelian);
            $this->db->insert('pembelian_detail', $data_pembelian_detail);
            redirect('pembelian/add');
        } else {
            $barang_id = 0;
            $data['qty'] = 1;
            $data['harga_per_kilo'] = 0;
            $data['harga_total'] = 0;
            $data['button'] = 0;
            $data['barang'] = $this->barang->getOver();
            /* Get data barang from id */
            $data['selected_barang'] = $this->db->get_where('barang', ['id' => $barang_id])->row_array();

            
            $this->template->load('template/admin_template', 'pembelian/add', $data);
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        $data = [
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->update('pembelian_detail', $data);

        redirect('pembelian/add');
    }

    public function selesai()
    {
        $pembelian_id = $this->uri->segment(3);

        $this->db->where('pembelian_id', $pembelian_id);
        $this->db->update('pembelian_detail', ['is_done' => '1']);

        $this->db->insert('pembelian', ['user_id' => $this->session->userdata('user_id')]);

        redirect('pembelian');
    }
}
