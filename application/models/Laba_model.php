<?php

class Laba_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->db->get('laba');
    }

    public function index_paging($page, $limiter)
    {
        return $this->db->query("SELECT * FROM laba LIMIT $page, $limiter");
    }
}