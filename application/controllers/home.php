<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
        $this->load->model('m_transaksi');
    }

    Public function index()
    {
        $data['judul'] = 'Beranda';
        $data['role_id'] = $this->session->userdata('role_id');
        $data['username'] = $this->session->userdata('username');
        $this->load->database();

        $produk = new m_produk;
        $data['produk'] = $produk->get_produk();
        $kategori = new m_kategori;
        $data['kategori'] = $kategori->get_kategori();

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
            'berat' => $this->input->post('berat'),
            'username' => $this->input->post('username'),
        );
        $this->cart->insert($data);

        redirect($redirect_page,'refresh');
    }

    public function keranjang()
    {
        $data['judul'] = 'Keranjang';
        $data['username'] = $this->session->userdata('username');
        if($data['username'] == null)
        {
            redirect('home');
        }

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

    public function checkout()
    {
        $data['judul'] = 'check out';
        $data['username'] = $this->session->userdata('username');

        $this->load->view('templates/header',$data);
        $this->load->view('home/checkout');
        $this->load->view('templates/footer');
    }

    public function proses_checkout()
    {
        $data['username'] = $this->session->userdata('username');
        //simpan ke detail transaksi
        $i = 1;
        foreach($this->cart->contents() as $items){
            $detail_data = array(
                'no_order' => $this->input->post('no_order'),
                'id_produk' => $items['id'],
                'qty' => $this->input->post('qty'.$i++)
            );
            $this->db->insert('detail_transaksi',$detail_data);
        }
        
        $data = array(
            'no_order' => $this->input->post('no_order'),
            'total_harga' => $this->input->post('total_harga'),
            'nama_penerima' => $this->input->post('nama_penerima'),
            'no_penerima' => $this->input->post('no_penerima'),
            'alamat' => $this->input->post('alamat'),
            'status' => $this->input->post('status'),
            'username_pembeli' => $data['username'],
            'username_penjual' => $this->input->post('username'),
        );

        $this->db->insert('transaksi', $data);
        $this->cart->destroy();
        redirect('home');
    }

    public function pesanan()
    {
        $data['judul'] = 'pesanan';
        $data['username'] = $this->session->userdata('username');

        $transaksi = new m_transaksi;
        $data['transaksi'] = $transaksi->get_transaksi($data['username']);
        $detail_transaksi = new m_transaksi;
        $data['detail_transaksi'] = $detail_transaksi->get_detailtransaksi($data['username']);

        $this->load->view('templates/header',$data);
        $this->load->view('home/pesanan');
        $this->load->view('templates/footer');
    }

    public function detailtransaksi($no_order)
    {
        $data['judul'] = 'detail transaksi';
        $data['username'] = $this->session->userdata('username');

        $transaksi = new m_transaksi;
        $data['transaksi'] = $transaksi->get_transaksibyno($no_order);
        $detail_transaksi = new m_transaksi;
        $data['detail_transaksi'] = $detail_transaksi->get_detailtransaksibyno($no_order);

        $this->load->view('templates/header',$data);
        $this->load->view('home/detailtransaksi');
        $this->load->view('templates/footer');
    }

    public function detailproduk($id_produk)
    {
        $data['judul'] = 'detail produk';
        $data['username'] = $this->session->userdata('username');

        $produk = new m_produk;
        $data['produk'] = $produk->get_produkbyid($id_produk);

        $this->load->view('templates/header',$data);
        $this->load->view('home/detailproduk');
        $this->load->view('templates/footer');
    }

    public function search()
    {
        $data['judul'] = 'search';
        $data['username'] = $this->session->userdata('username');
        $data['search'] = $this->input->post('search');
        $produk = new m_produk;
        $data['produk'] = $produk->get_produkbykw($data['search']);
        $this->load->view('templates/header',$data);
        $this->load->view('home/search');
        $this->load->view('templates/footer');
    }
}