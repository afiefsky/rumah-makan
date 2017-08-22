<?php

class Menu_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->db->get('menu');
    }

    public function index_paging($page, $limiter)
    {
        return $this->db->query("SELECT * FROM menu LIMIT $page, $limiter");
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('menu');
    }
}