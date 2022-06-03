<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
    }

    Public function index()
    {
        $data['judul'] = 'Beranda';
        $data['role_id'] = $this->session->userdata('role_id');
        $data['username'] = $this->session->userdata('username');
        $this->load->database();

        $produk = new m_produk;
        $data['produk'] = $produk->get_produk();

        $this->load->view('templates/header',$data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
        );
        $this->cart->insert($data);

        redirect($redirect_page,'refresh');
    }

    public function keranjang()
    {
        $data['judul'] = 'Keranjang';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/header',$data);
        $this->load->view('home/cart');
        $this->load->view('templates/footer');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('home/keranjang');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items){
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i.'[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        redirect('home/keranjang');
    }
}