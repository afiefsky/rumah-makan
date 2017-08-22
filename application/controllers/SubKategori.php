<?php

class SubKategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SubKategori_model');
        $this->subkategori = $this->SubKategori_model;
    }

    public function index()
    {
        $data['record'] = $this->subkategori->getAll();
        if ($this->session->userdata('kategori_id') == 1) {
            $template = 'template/admin_template';
        } else {
            $template = 'template/kasir_template';
        }
        $this->template->load($template, 'subkategori/index', $data);
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $data['nama'] = $this->input->post('nama');
            $data['kategori_id'] = 1;

            $this->db->insert('barang_sub_kategori', $data);

            redirect('subkategori');
        } else {
            $data['record'] = $this->subkategori->getAll();
            if ($this->session->userdata('kategori_id') == 1) {
                $template = 'template/admin_template';
            } else {
                $template = 'template/kasir_template';
            }
            $this->template->load($template, 'subkategori/add');
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id');
            $data['nama'] = $this->input->post('nama');
            $data['kategori_id'] = 1;

            $this->db->where('id', $id);
            $this->db->update('barang_sub_kategori', $data);

            redirect('subkategori');
        } else {
            $id = $this->uri->segment(3);

            $data['record'] = $this->subkategori->getOne($id)->row_array();

            $this->template->load('template/admin_template', 'subkategori/edit', $data);
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);
        $this->db->delete('barang_sub_kategori');

        redirect('subkategori/index');
    }
}
