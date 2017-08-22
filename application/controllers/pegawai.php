<?php

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
        $this->pegawai = $this->Pegawai_model;
    }

    public function index()
    {
        $data['record'] = $this->pegawai->getAll();
        $this->template->load('template/admin_template', 'pegawai/index', $data);
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            $data['nama_depan'] = $this->input->post('nama_depan');
            $data['nama_belakang'] = $this->input->post('nama_belakang');
            $data['no_hp'] = $this->input->post('no_hp');
            $data['posisi'] = $this->input->post('posisi');
            $data['gaji'] = $this->input->post('gaji');

            $this->db->where('id', $this->uri->segment(3));
            $this->db->update('pegawai', $data);

            redirect('pegawai');
        } else {
            $id = $this->uri->segment(3);
            $data['record'] = $this->pegawai->getOne($id)->row_array();
            $this->template->load('template/admin_template', 'pegawai/edit', $data);
        }
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $data['nama_depan'] = $this->input->post('nama_depan');
            $data['nama_belakang'] = $this->input->post('nama_belakang');
            $data['no_hp'] = $this->input->post('no_hp');
            $data['posisi'] = $this->input->post('posisi');
            $data['gaji'] = $this->input->post('gaji');

            $this->db->insert('pegawai', $data);
            redirect('pegawai');
        } else {
            $this->template->load('template/admin_template', 'pegawai/add');
        }
    }
}
