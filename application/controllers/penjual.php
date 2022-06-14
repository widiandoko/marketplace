<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjual extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
        $this->load->model('m_transaksi');
    }

    public function index()
    {
        $data['judul'] = 'penjual';
        $data['username'] = $this->session->userdata('username');
        $this->load->view('templates/head', $data);
        $this->load->view('dashboard/penjual');
        $this->load->view('penjual/toko');
    }

    public function produk()
    {
        $data['judul'] = 'penjual';
        $data['username'] = $this->session->userdata('username');

        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/marketplace/penjual/produk';
        $config['total_rows'] = $this->m_produk->countallprodukbyun($data['username']);
        $config['per_page'] = 12;

        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();

        $produk = new m_produk;
        $data['produk'] = $produk->get_produkbyun($data['username'],12,0);
        $this->load->view('templates/head', $data);
        $this->load->view('dashboard/penjual');
        $this->load->view('penjual/produk');
    }

    public function tambahproduk()
    {
        $data['judul'] = 'penjual';
        $data['username'] = $this->session->userdata('username');
        $produk = new m_kategori;
        $data['kategori'] = $produk->get_kategori();
        $this->load->view('templates/head', $data);
        $this->load->view('dashboard/penjual');
        $this->load->view('penjual/tambahproduk');
    }

    public function editproduk($id_produk)
    {
        $data['judul'] = 'penjual';
        $data['username'] = $this->session->userdata('username');

        $produk = new m_kategori;
        $data['kategori'] = $produk->get_kategori();
        $data['produk'] = $this->m_produk->get_produkbyid($id_produk);
        $this->load->view('templates/head', $data);
        $this->load->view('dashboard/penjual');
        $this->load->view('penjual/editproduk');
    }

    public function edit($id_produk)
    {
        $old_filename = $this->input->post('old_gambar_produk');
        $new_filename = $_FILES['gambar_produk']['name'];


        if ($new_filename == TRUE)
        {
            if ($this->upload->do_upload('gambar_produk')) {
                // print_r($this->upload->data());
                $gambar_produk = $this->upload->data('file_name');
            } else {
                print_r($this->upload->display_errors());
            } 
        } else {
            $gambar_produk = $old_filename;
        }
             
        $data['username'] = $this->session->userdata('username');

        $data = [
            'nama_produk' => ($this->input->post('nama_produk')),
            'deskripsi_produk' => ($this->input->post('deskripsi_produk')),
            'harga_produk' => ($this->input->post('harga_produk')),
            'gambar_produk' => $gambar_produk,
            'berat' => ($this->input->post('berat_produk')),
            'id_kategori' => ($this->input->post('id_kategori')),
            'username' => $data['username']
        ];

        $this->db->set($data);
        $this->m_produk->update_produk($id_produk);
        redirect('penjual/produk');
    }

    public function deleteproduk($id_produk)
    {
        $this->m_produk->delete_produk($id_produk);
        redirect('penjual/produk');
    }

    public function tambah()
    {
        if ($this->upload->do_upload('gambar_produk')) {
            // print_r($this->upload->data());
            $gambar_produk = $this->upload->data('file_name');
        } else {
            print_r($this->upload->display_errors());
        }      
        $data['username'] = $this->session->userdata('username');

        $data = [
            'nama_produk' => ($this->input->post('nama_produk')),
            'deskripsi_produk' => ($this->input->post('deskripsi_produk')),
            'harga_produk' => ($this->input->post('harga_produk')),
            'gambar_produk' => $gambar_produk,
            'berat' => ($this->input->post('berat_produk')),
            'id_kategori' => ($this->input->post('id_kategori')),
            'username' => $data['username']
        ];

        $this->db->insert('produk', $data);
        redirect('penjual/produk');
    }

    public function penjualan()
    {
        $data['judul'] = 'penjual';
        $data['username'] = $this->session->userdata('username');

        $transaksi = new m_transaksi;
        $data['transaksi'] = $transaksi->get_transaksipenjual($data['username']);
        $detail_transaksi = new m_transaksi;
        $data['detail_transaksi'] = $detail_transaksi->get_detailtransaksi($data['username']);

        $this->load->view('templates/head', $data);
        $this->load->view('dashboard/penjual');
        $this->load->view('penjual/penjualan');
    }

    public function detailtransaksi($no_order)
    {
        $data['judul'] = 'penjual';
        $data['username'] = $this->session->userdata('username');

        $transaksi = new m_transaksi;
        $data['transaksi'] = $transaksi->get_transaksibyno($no_order);
        $detail_transaksi = new m_transaksi;
        $data['detail_transaksi'] = $detail_transaksi->get_detailtransaksibyno($no_order);

        $this->load->view('templates/head',$data);
        $this->load->view('dashboard/penjual');
        $this->load->view('penjual/detailtransaksi');
    }

    public function sudahbayar($no_order)
    {   
        $data = [
            'status' => 1
        ];
        $this->db->set($data);
        $this->m_transaksi->sudahbayar($no_order);
        redirect('penjual/penjualan');
    }
}