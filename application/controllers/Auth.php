<?php
class Auth extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model');
        $this->pengguna = $this->Pengguna_model;
    }

    public function index()
    {
        redirect('auth/login');
    }
            
    public function login()
    {
        if (isset($_POST['submit'])) {
            // prosess login disini
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $hasil = $this->pengguna->login($username, $password);

            if ($hasil == 1) {
                redirect('dashboard');
            } else {
                redirect('auth/login');
            }
        } else {
            $this->template->load('template/login_template', 'form_login');
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
