<?php

class Tipe extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tipe_model');
		$this->tipe = $this->Tipe_model;
	}

	public function index()
	{
		$data['record'] = $this->tipe->getAll();

		$this->template->load('template/admin_template', 'tipe/index', $data);
	}

	public function add()
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama');

			$data = [
				'nama' => $nama
			];

			$this->db->insert('barang_tipe', $data);

			redirect('tipe/index');
		} else {
			$this->template->load('template/admin_template' ,'tipe/add');
		}
	}

	public function edit()
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama');

			$data = [
				'nama' => $nama
			];

			$this->db->where('id', $this->uri->segment(3));
			$this->db->update('barang_tipe', $data);

			redirect('tipe/index');
		} else {
			$tipe_id = $this->uri->segment(3);

			$data['record'] = $this->tipe->getOne($tipe_id)->row_array();

			$this->template->load('template/admin_template', 'tipe/edit', $data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(3);

		$this->db->where('id', $id);
		$this->db->delete('barang_tipe');

		redirect('tipe/index');
	}
}