<?php
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
        $this->template->load('template/admin_template', 'view_dashboard');
    }
}
