<?php
class Pembelian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Pembelian_model', 'Barang_model']);
        $this->pembelian = $this->Pembelian_model;
        $this->barang = $this->Barang_model;
    }

    public function index()
    {
        $data['record'] = $this->pembelian->getAllPembelian();

        $this->template->load('template/admin_template', 'pembelian/index', $data);
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
        $data = $this->pembelian->cetak($id);
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

    function laporan()
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
        $pdf->Cell(27, 7, 'Pengurus', 1, 0);
        $pdf->Cell(36, 7, 'Tanggal', 1, 0);
        $pdf->Cell(38, 7, 'Subtotal', 1, 1);
        //OUTPUT FROM DATABASE
        $pdf->SetFont('Arial', '', 'L');

        $no = 0;
        $total = 0;
        $data = $this->pembelian->laporan();

        foreach ($data->result() as $r) {
            $no++;
            $pdf->Cell(10, 7, $no, 1, 0);
            $pdf->Cell(27, 7, $r->nama_depan . $r->nama_belakang, 1, 0);
            $pdf->Cell(36, 7, $r->created_at, 1, 0);
            $pdf->Cell(38, 7, $r->total, 1, 1);
            $total = $total+$r->total;
        }

        //END
        $pdf->cell(73, 7, 'Total',1,0, 'R');
        $pdf->cell(38, 7, $total,1,0);
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

    public function add()
    {
        $count = $this->db->query("SELECT max(id) AS count FROM pembelian ORDER BY id DESC LIMIT 1")->row_array();

        $pembelian_id = $count['count'] + 1;

        $this->session->set_userdata('pembelian_id', $pembelian_id);
        $data['pembelian_id'] = $pembelian_id;
        $data['select_pembelian'] = $this->pembelian->getAllByPembelianId($pembelian_id);
        $data['allowEnd'] = $this->session->userdata('allowEnd');

        if (isset($_POST['submit_check'])) {
            /* Set pembelian_id session */

            $barang_id = $this->input->post('barang_id');
            $qty = $this->input->post('qty');

            $data['button'] = 1;
            $data['qty'] = $qty;

            /* Get all barang */
            $data['barang'] = $this->barang->getAll();

            /* Get data barang from id */
            $data['selected_barang'] = $this->db->get_where('barang', ['id' => $barang_id])->row_array();

            $data['jumlah_per_kilo'] = $data['selected_barang']['jumlah_per_kilo'] * $qty;

            /* Get barang price from id */
            $data['barang_price'] = $this->db->get_where('barang', ['id' => $barang_id])->row_array();

            $data['barang_quantity'] = $this->db->get_where('barang_quantity', ['barang_id' => $barang_id])->row_array();

            $data['potong'] = $data['barang_quantity']['qty'] * $qty;

            $data['harga_per_kilo'] = $data['barang_price']['harga_per_kilo'];

            $data['harga_total'] = $data['barang_price']['harga_per_kilo'] * $qty;
            // $laba = $this->input->post('laba');
            
            $this->template->load('template/admin_template', 'pembelian/add', $data);
        } elseif (isset($_POST['submit_keranjang'])) {
            // $pembelian_id   = $this->session->userdata('pembelian_id');
            $barang_id      = $this->input->post('barang_id');
            $qty            = $this->input->post('qty');

            $this->session->set_userdata(['allowEnd' => 1]);

            $data_pembelian = [
                'user_id' => $this->session->userdata('user_id')
            ];

            $data_pembelian_detail = [
                'pembelian_id'  => $this->session->userdata('pembelian_id'),
                'barang_id'     => $barang_id,
                'qty'           => $qty
            ];

            // $this->db->insert('pembelian', $data_pembelian);
            $this->db->insert('pembelian_detail', $data_pembelian_detail);
            redirect('pembelian/add');
        } else {
            $barang_id = 0;
            $data['potong'] = 0;
            $data['qty'] = 1;
            $data['jumlah_per_kilo'] = 0;
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
        $this->db->delete('pembelian');

        redirect('pembelian');
    }

    public function selesai()
    {
        $pembelian_id = $this->uri->segment(3);

        $this->db->where('pembelian_id', $pembelian_id);
        $this->db->update('pembelian_detail', ['is_done' => '1']);

        $this->db->insert('pembelian', ['id' => $pembelian_id, 'user_id' => $this->session->userdata('user_id')]);

        redirect('pembelian');
    }
}
