<?php

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Barang_model');
        $this->load->model('Pembelian_model');
        $this->load->model('Menu_model');

        $this->barang = $this->Barang_model;
        $this->pembelian = $this->Pembelian_model;
        $this->menu = $this->Menu_model;
    }

    public function page_pagination()
    {
        $config['pagination']['full_tag_open'] = '<ul>';
        $config['pagination']['full_tag_close'] = '</ul>';
        $config['pagination']['first_tag_open'] = '<li>';
        $config['pagination']['first_tag_close'] = '</li>';
        $config['pagination']['last_tag_open'] = '<li>';
        $config['pagination']['last_tag_close'] = '</li>';
        $config['pagination']['next_tag_open'] = '<li>';
        $config['pagination']['next_tag_close'] = '</li>';
        $config['pagination']['prev_tag_open'] = '<li>';
        $config['pagination']['prev_tag_close'] = '</li>';
        $config['pagination']['cur_tag_open'] = '<li class="disabled"><span>';
        $config['pagination']['cur_tag_close'] = '</span></li>';
        $config['pagination']['num_tag_open'] = '<li>';
        $config['pagination']['num_tag_close'] = '</li>';
    }

    public function index()
    {
        // $data['record'] = $this->pembelian->collectedIndex();
        $this->load->library('pagination');

        $config['base_url'] = base_url().'index.php/menu/index/';
        $config['total_rows'] = $this->menu->index()->num_rows();

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

        $data['record'] = $this->menu->index_paging($page, $config['per_page']);


        if ($this->session->userdata('kategori_id') == 1) {
            $template = 'template/admin_template';
        } else {
            $template = 'template/kasir_template';
        }

        $this->template->load($template, 'penjualan/menu/index', $data);
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $data['nama']       = $this->input->post('nama');
            $data['kategori']   = $this->input->post('kategori');
            $data['harga']      = $this->input->post('harga');

            $this->db->insert('menu', $data);
            
            redirect('menu/index');
        } else {
            $this->template->load('template/admin_template', 'penjualan/menu/add');
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            $data['nama']       = $this->input->post('nama');
            $data['kategori']   = $this->input->post('kategori');
            $data['harga']      = $this->input->post('harga');

            $this->db->where('id', $this->uri->segment(3));
            $this->db->update('menu', $data);

            redirect('menu/index');
        } else {
            $menu_id = $this->uri->segment(3);

            $data['record'] = $this->menu->get($menu_id)->row_array();

            $this->template->load('template/admin_template', 'penjualan/menu/edit', $data);
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);
        $this->db->delete('menu');

        redirect('menu/index');
    }
}
