<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Pembelian_model');
        $this->barang = $this->Barang_model;
        $this->pembelian = $this->Pembelian_model;
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url().'index.php/barang/index/';
        $config['total_rows'] = $this->barang->index()->num_rows();

        if (isset($_POST['submit_page'])) {
            $this->session->set_userdata(['per_page' => $this->input->post('page_length')]);
        } else {

        }

        if ($this->session->userdata('per_page') == null) {
            $config['per_page'] = 1;
        } else {
            $config['per_page'] = $this->session->userdata('per_page');
        }

        $this->pagination->initialize($config);

        $data['paging'] = $this->pagination->create_links();
        $page = $this->uri->segment(3);
        $page = $page == '' ? 0 : $page;

        $data['record'] = $this->barang->index_paging($page, $config['per_page']);
        // $data['record'] = $this->barang->everything();

        $this->template->load('template/admin_template', 'barang/index', $data);
        // $this->load->view('barang/index', $data);
    }

    public function penjualan()
    {
        $data['record'] = $this->pembelian->getAllDetail();

        if ($this->session->userdata('kategori_id') == 1) {
            $template = 'template/admin_template';
        } else {
            $template = 'template/kasir_template';
        }

        $this->template->load($template, 'penjualan/index', $data);
        // $this->load->view('barang/index', $data);
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            /* Step 1 */
            $data['nama'] = $this->input->post('nama');
            $data['jenis'] = $this->input->post('jenis');
            $data['harga_per_kilo'] = $this->input->post('harga_per_kilo');
            $data['jumlah_per_kilo'] = $this->input->post('jumlah_per_kilo');

            $this->db->insert('barang', $data);

            // $sub_kategori_id = $this->input->post('sub_kategori_id');

            // $data['barang'] = [
            //     'nama' => $nama,
            //     'kategori_id' => $jenis,
            //     'sub_kategori_id' => $sub_kategori_id
            // ];

            // $this->db->insert('barang', $data['barang']);
            // /* End step 1 */

            // /* Step 2 */
            // $data['barang_get'] = $this->db->get_where('barang', ['nama' => $nama])->row_array();

            // $barang_id = $data['barang_get']['id'];

            // $data['barang_price'] = [
            //     'barang_id' => $barang_id,
            //     'price' => $this->input->post('harga_price')
            // ];

            // $this->db->insert('barang_price', $data['barang_price']);
            // /* End step 2 */

            // /* Step 3 */
            // $data['barang_per_price'] = [
            //     'barang_id' => $barang_id,
            //     'per_price' => $this->input->post('harga_per_price')
            // ];

            // $this->db->insert('barang_per_price', $data['barang_per_price']);
            // /* End step 3 */

            // /* Step 4 */
            // $data['barang_quantity'] = [
            //     'barang_id' => $barang_id,
            //     'qty' => $this->input->post('qty')
            // ];

            // $this->db->insert('barang_quantity', $data['barang_quantity']);
            // /* End step 4 */

            redirect('barang/index');
        } else {
            $data['all'] = $this->barang->getAllKategori();
            $data['sub'] = $this->barang->getAllSubKategori();
            $this->template->load('template/admin_template', 'barang/add', $data);
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            $nama = $this->input->post('nama');
            $jenis = $this->input->post('jenis');
            $harga_per_kilo = $this->input->post('harga_per_kilo');
            $jumlah_per_kilo = $this->input->post('jumlah_per_kilo');

            $data = [
                'nama' => $nama,
                'jenis' => $jenis,
                'harga_per_kilo' => $harga_per_kilo,
                'jumlah_per_kilo' => $jumlah_per_kilo
            ];

            $this->db->where('id', $this->uri->segment(3));
            $this->db->update('barang', $data);

            redirect('barang/index');
        } else {
            $barang_id = $this->uri->segment(3);

            $data['record'] = $this->barang->getOne($barang_id)->row_array();
            $data['all'] = $this->barang->getAllKategori();

            $this->template->load('template/admin_template', 'barang/edit', $data);
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);
        $this->db->delete('barang');

        redirect('barang/index');
    }
}