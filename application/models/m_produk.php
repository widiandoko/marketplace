<?php

class m_produk extends CI_Model {
    public function get_produk(){
        $query = $this->db->get('produk');
        return $query->result();
    }

    public function get_produkbyun($username){
        $this->db->where('username',$username);
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori');
        $query = $this->db->get('produk');
        return $query->result();
    }

    public function delete_produk($id){
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }

    public function get_produkbyid($id){
        $this->db->where('id_produk',$id);
        $query = $this->db->get('produk');
        return $query->result();
    }

    public function update_produk($id){
        $this->db->where('id_produk',$id);
        $query = $this->db->update('produk');
    }

    public function countallprodukbyun($username){
        $this->db->where('username',$username);
        return $this->db->get('produk')->num_rows();
    }

    public function get_produkbykw($search){
        $this->db->like('nama_produk', $search);
        $query = $this->db->get('produk');
        return $query->result();
    }
}
