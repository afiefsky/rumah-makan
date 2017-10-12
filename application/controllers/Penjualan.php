<?php

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Penjualan_model', 'Barang_model', 'Barang_quantity_model', 'Menu_model']);
        $this->penjualan = $this->Penjualan_model;
        $this->barang = $this->Barang_model;
        $this->quantity = $this->Barang_quantity_model;
        $this->menu = $this->Menu_model;
    }

    public funcion meja()
    {
        
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url().'index.php/penjualan/index/';
        $config['total_rows'] = $this->penjualan->get()->num_rows();

        if (isset($_POST['submit_page'])) {
            $this->session->set_userdata(['per_page' => $this->input->post('page_length')]);
        } else {

        }

        if ($this->session->userdata('per_page') == null) {
            $config['per_page'] = 5;
        } else {
            $config['per_page'] = $this->session->userdata('per_page');
        }

        $this->pagination->initialize($config);

        $data['paging'] = $this->pagination->create_links();
        $page = $this->uri->segment(3);
        $page = $page == '' ? 0 : $page;

        $data['record'] = $this->penjualan->index_paging($page, $config['per_page']);

        $this->template->load('template/kasir_template', 'transaksi/penjualan/index', $data);
    }

    public function cetak()
    {
        $id = $this->uri->segment(3);

        $this->load->library('cfpdf');
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 'L');
        $pdf->SetFontSize(14);
        $pdf->Cell(78, 10, 'RUMAH MAKAN SIANG MALAM', 0, 0);
        $pdf->Cell(10, 10, '', 0, 0);
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10, 'Tanggal: ' . date('d-m-Y'), 0, 1);
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10, '', '', 1);
        $pdf->Cell(10, 7, 'No', 1, 0);
        $pdf->Cell(27, 7, 'Menu', 1, 0);
        $pdf->Cell(10, 7, 'Qty', 1, 0);
        $pdf->Cell(30, 7, 'Harga', 1, 0);
        $pdf->Cell(30, 7, 'Subtotal', 1, 1);
        //OUTPUT FROM DATABASE
        $pdf->SetFont('Arial', '', 'L');

        $no = 0;
        $total = 0;
        $data = $this->penjualan->cetak($id);
        $subtotal = 0;
        foreach ($data->result() as $r) {
            $no++;
            $pdf->Cell(10, 7, $no, 1, 0);
            $pdf->Cell(27, 7, $r->barang_name, 1, 0);
            $pdf->Cell(10, 7, $r->qty, 1, 0);
            $pdf->Cell(30, 7, $r->price, 1, 0);
            $pdf->Cell(30, 7, ($subtotal = $r->price * $r->qty), 1, 1);
            $total = $total+$subtotal;
        }

        //END
        $pdf->cell(77, 7, 'Total',1,0, 'R');
        $pdf->cell(30, 7, $total, 1, 0);
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->Cell(10, 10, 'Penerima', 0, 0);
        $pdf->Cell(15, 10, '', 0, 0);
        $pdf->Cell(10, 10, 'Hormat kami', 0, 0);
        $pdf->output();
    }

    public function laporan()
    {
        $this->load->library('cfpdf');
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 'L');
        $pdf->SetFontSize(14);
        $pdf->Cell(78, 10, 'RUMAH MAKAN SIANG MALAM', 0, 0);
        $pdf->Cell(10, 10, '', 0, 0);
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10, 'Tanggal: ' . date('d-m-Y'), 0, 1);
        $pdf->SetFontSize(10);
        $pdf->Cell(10, 10, '', '', 1);
        $pdf->Cell(10, 7, 'No', 1, 0);
        $pdf->Cell(27, 7, 'Menu', 1, 0);
        $pdf->Cell(10, 7, 'Qty', 1, 0);
        $pdf->Cell(30, 7, 'Harga', 1, 0);
        $pdf->Cell(30, 7, 'Subtotal', 1, 1);
        //OUTPUT FROM DATABASE
        $pdf->SetFont('Arial', '', 'L');

        $no = 0;
        $total = 0;
        $data = $this->penjualan->laporan();
        $subtotal = 0;
        foreach ($data->result() as $r) {
            $no++;
            $pdf->Cell(10, 7, $no, 1, 0);
            $pdf->Cell(27, 7, $r->barang_name, 1, 0);
            $pdf->Cell(10, 7, $r->qty, 1, 0);
            $pdf->Cell(30, 7, $r->price, 1, 0);
            $pdf->Cell(30, 7, ($subtotal = $r->price * $r->qty), 1, 1);
            $total = $total+$subtotal;
        }

        //END
        $pdf->cell(77, 7, 'Total',1,0, 'R');
        $pdf->cell(30, 7, $total, 1, 0);
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->Cell(10, 10, 'Penerima', 0, 0);
        $pdf->Cell(15, 10, '', 0, 0);
        $pdf->Cell(10, 10, 'Hormat kami', 0, 0);
        $pdf->output();
    }

    public function detail()
    {
        $pembelian_id = $this->uri->segment(3);

        $data['record'] = $this->pembelian->getDetail($pembelian_id);

        $this->template->load('template/admin_template', 'pembelian/detail', $data);
    }

    public function detail_penjualan()
    {
        $penjualan_id = $this->uri->segment(3);

        $data['record'] = $this->penjualan->getById($penjualan_id);

        $this->template->load('template/admin_template', 'penjualan/menu/detail', $data);
    }

    public function add()
    {
        /* Global declaration of penjualan_id */
        $select_max = $this->penjualan->max()->row_array();

        $data['penjualan_id'] = $select_max['max'] + 1;
        $this->session->set_userdata('penjualan_id', $data['penjualan_id']);
        /* End */

        if (isset($_POST['submit_finish'])) {
            
        } elseif (isset($_POST['submit_check'])) {
            $menu_id = $this->input->post('menu_id');
            $qty = $this->input->post('qty');

            /* Cash */
            $data['cash'] = $this->session->userdata('cash');
            $data['selesai'] = $this->session->userdata('selesai');

            $data['qty'] = $qty;
            $data['record_find_menu'] = $this->menu->find($menu_id);
            $data['find_menu_array'] = $data['record_find_menu']->row_array();

            $data['record_harga'] = $data['find_menu_array']['harga'];
            $data['record_harga_calculated'] = $data['record_harga'] * $qty;

            $data['record_purchased'] = $this->penjualan->all($data['penjualan_id']);
            $data['record_menu'] = $this->menu->index();

            $this->template->load('template/kasir_template', 'transaksi/penjualan/add', $data);
        } elseif (isset($_POST['submit_charge'])) {
            $total = $this->input->post('total');
            $cash = $this->input->post('cash');

            $charge = $cash - $total;

            $this->session->set_userdata('selesai', 1);

            $this->session->set_userdata([
                'cash' => $cash,
                'charge' => $charge
            ]);

            redirect('penjualan/add');
        } elseif (isset($_POST['submit_keranjang'])) {
            $data['menu_id'] = $this->input->post('menu_id');
            $data['qty'] = $this->input->post('qty');
            $data['is_done'] = '0';

            // $this->quantity->update($data['barang_id'], $data['qty']);

            $this->db->insert('penjualan_detail', $data);
            $data['cash'] = $this->session->userdata('cash');
            redirect('penjualan/add');
        } else {
            /* Cash of the customer */
            $data['cash'] = $this->session->userdata('cash');

            $data['find_menu_array'] = 0;
            $data['qty'] = 1;
            $data['record_harga'] = 0;
            $data['record_harga_calculated'] = 0;
            $data['record_menu'] = $this->menu->index();

            /* Finish button */
            $data['selesai'] = $this->session->userdata('selesai');

            $data['record_purchased'] = $this->penjualan->all($data['penjualan_id']);

            $this->template->load('template/kasir_template', 'transaksi/penjualan/add', $data);
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        $data = [
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $this->db->where('id', $id);
        $this->db->delete('pembelian');

        redirect('pembelian');
    }

    public function selesai()
    {
        $penjualan_id = $this->session->userdata('penjualan_id');

        $this->db->where('penjualan_id', $penjualan_id);
        $this->db->update('penjualan_detail', ['is_done' => '1']);

        $this->db->insert('penjualan', ['id' => $penjualan_id, 'user_id' => $this->session->userdata('user_id')]);

        redirect('penjualan');
    }
}