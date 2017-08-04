<?php

class Tipe_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getAll()
	{
		return $this->db->get('barang_tipe');
	}

	public function getOne($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('barang_tipe');
	}

}