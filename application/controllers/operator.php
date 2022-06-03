<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class operator extends CI_Controller {
    public function index()
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1)
        {
            redirect(base_url());
        }
        $data['judul'] = 'operator';
        $data['username'] = $this->session->userdata('username');
        $this->load->view('templates/head', $data);
        $this->load->view('dashboard/operator');
        $this->load->view('operator/akun');
    }

    public function kategori()
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id != 1)
        {
            redirect(base_url());
        }
        $data['judul'] = 'operator';
        $data['username'] = $this->session->userdata('username');
        $this->load->view('templates/head');
        $this->load->view('dashboard/operator');
    }
}