<?php

class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model');
		$this->barang = $this->Barang_model;
	}

	public function index()
	{
		$data['record'] = $this->barang->getAll();

		$this->template->load('template/admin_template', 'barang/index', $data);
		// $this->load->view('barang/index', $data);
	}

	public function add()
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama');
			$jenis = $this->input->post('jenis');

			$data = [
				'nama' => $nama,
				'tipe_id' => $jenis
			];

			$this->db->insert('barang', $data);

			redirect('barang/index');
		} else {
			$data['all'] = $this->barang->getAllTipe();
			$this->template->load('template/admin_template' ,'barang/add', $data);
		}
	}

	public function edit()
	{
		if (isset($_POST['submit'])) {
			$nama = $this->input->post('nama');
			$jenis = $this->input->post('jenis');

			$data = [
				'nama' => $nama,
				'tipe_id' => $jenis
			];

			$this->db->where('id', $this->uri->segment(3));
			$this->db->update('barang', $data);

			redirect('barang/index');
		} else {
			$barang_id = $this->uri->segment(3);

			$data['record'] = $this->barang->getOne($barang_id)->row_array();
			$data['all'] = $this->barang->getAllTipe();

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