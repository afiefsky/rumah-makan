<?php

class Meja_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $this->db->get('meja');
    }
}