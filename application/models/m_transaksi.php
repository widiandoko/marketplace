<?php

class m_transaksi extends CI_Model {
    public function get_transaksijoin4($username)
    {
        $this->db->where('transaksi.username',$username);
        $this->db->join('detail_transaksi', 'transaksi.no_order = detail_transaksi.no_order');
        $this->db->join('produk', 'detail_transaksi.id_produk = produk.id_produk');
        $this->db->join('user', 'produk.username = produk.username');
        $this->db->join('penjual', 'user.nik = penjual.nik');
        $query = $this->db->get('transaksi');
        return $query->result();
    }

    public function get_transaksijoin($username)
    {
        $this->db->where('transaksi.username',$username);
        $this->db->join('detail_transaksi', 'transaksi.no_order = detail_transaksi.no_order');
        $query = $this->db->get('transaksi');
        return $query->result();
    }

    public function get_transaksibyno($no_order)
    {
        $this->db->where('transaksi.no_order',$no_order);
        $query = $this->db->get('transaksi');
        return $query->result();
    }

    public function get_detailtransaksibyno($no_order)
    {
        $this->db->where('detail_transaksi.no_order',$no_order);
        $this->db->join('produk', 'detail_transaksi.id_produk = produk.id_produk');
        $query = $this->db->get('detail_transaksi');
        return $query->result();
    }

    public function get_transaksi($username)
    {
        $this->db->where('transaksi.username_pembeli',$username);
        $query = $this->db->get('transaksi');
        return $query->result();
    }

    public function get_detailtransaksi($username)
    {
        $this->db->where('transaksi.username_pembeli',$username);
        $this->db->join('detail_transaksi', 'transaksi.no_order = detail_transaksi.no_order');
        $query = $this->db->get('transaksi');
        return $query->result();
    }

    public function get_transaksipenjual($username)
    {
        $this->db->where('transaksi.username_penjual',$username);
        $query = $this->db->get('transaksi');
        return $query->result();
    }

    public function get_detailtransaksipenjual($username)
    {
        $this->db->where('transaksi.username_penjual',$username);
        $this->db->join('detail_transaksi', 'transaksi.no_order = detail_transaksi.no_order');
        $query = $this->db->get('transaksi');
        return $query->result();
    }

    public function sudahbayar($no_order){
        $this->db->where('no_order', $no_order);
        $query = $this->db->update('transaksi');
    }
}