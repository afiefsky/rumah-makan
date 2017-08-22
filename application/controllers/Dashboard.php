<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Meja_model');
        $this->meja = $this->Meja_model;
	}

    public function index()
    {
        /* Global variable user role */
        $user_role = $this->session->userdata('kategori_id');

        $data['table'] = $this->meja->index();

        if ($user_role == 1) {
            $this->template->load('template/admin_template', 'dashboard/admin/index', $data);
        } else {
            $this->template->load('template/kasir_template', 'dashboard/kasir/index', $data);
        }
    }
}
