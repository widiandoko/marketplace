<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class operator extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
    }

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

        $kategori = new m_kategori;
        $data['kategori'] = $kategori->get_kategori();
        $this->load->view('templates/head',$data);
        $this->load->view('dashboard/operator');
        $this->load->view('operator/kategori');
    }

    public function tambahkategori()
    {
        $data['judul'] = 'operator';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/head', $data);
        $this->load->view('dashboard/operator');
        $this->load->view('operator/tambahkategori');
    }

    public function tambah()
    {   
        $data['username'] = $this->session->userdata('username');

        $data1 = [
            'nama_kategori' => ($this->input->post('nama_kategori')),
        ];

        $this->db->insert('kategori', $data1);
        redirect('operator/kategori');
    }

    public function editkategori($id_kategori)
    {
        $data['judul'] = 'operator';
        $data['username'] = $this->session->userdata('username');

        $kategori = new m_kategori;
        $data['kategori'] = $this->m_kategori->get_kategoribyid($id_kategori);
        $this->load->view('templates/head', $data);
        $this->load->view('dashboard/penjual');
        $this->load->view('operator/editkategori');
    }

    public function edit($id_kategori)
    {   
        $data['username'] = $this->session->userdata('username');

        $data = [
            'nama_kategori' => ($this->input->post('nama_kategori')),
        ];

        $this->db->set($data);
        $this->m_kategori->update_kategori($id_kategori);
        redirect('operator/kategori');
    }

    public function deletekategori($id_kategori)
    {
        $this->m_kategori->delete_kategori($id_kategori);
        redirect('operator/kategori');
    }

}