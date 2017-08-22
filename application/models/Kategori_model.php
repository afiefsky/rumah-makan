<?php

class Kategori_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAll()
	{
		return $this->db->get('barang_kategori');
	}

	public function getOne($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('barang_kategori');
	}

}