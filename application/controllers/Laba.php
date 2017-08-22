<?php 

class Laba extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Laba_model']);
        $this->laba = $this->Laba_model;
    }

    public function index()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url().'index.php/laba/index/';
        $config['total_rows'] = $this->laba->index()->num_rows();

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

        $data['record'] = $this->laba->index_paging($page, $config['per_page']);

        $this->template->load('template/admin_template', 'laba/index', $data);
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $data['pembelian'] = $this->input->post('pembelian');
            $data['penjualan'] = $this->input->post('penjualan');

            $data['hasil'] = $data['penjualan'] - $data['pembelian'];

            $this->db->insert('laba', $data);

            redirect('laba');
        } else {
            $this->template->load('template/admin_template', 'laba/add');
        }
    }
}
