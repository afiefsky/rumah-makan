<?php

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model');
		$this->kategori = $this->Kategori_model;
	}

	public function index()
	{
		$data['record'] = $this->kategori->getAll();

		$this->template->load('template/admin_template', 'kategori/index', $data);
	}

	public function add()
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama');

			$data = [
				'nama' => $nama
			];

			$this->db->insert('barang_kategori', $data);

			redirect('kategori/index');
		} else {
			$this->template->load('template/admin_template' ,'kategori/add');
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
			$this->db->update('barang_kategori', $data);

			redirect('kategori/index');
		} else {
			$kategori_id = $this->uri->segment(3);

			$data['record'] = $this->kategori->getOne($kategori_id)->row_array();

			$this->template->load('template/admin_template', 'kategori/edit', $data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(3);

		$this->db->where('id', $id);
		$this->db->delete('barang_kategori');

		redirect('kategori/index');
	}
}