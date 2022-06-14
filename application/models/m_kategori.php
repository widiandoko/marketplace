<?php

class m_kategori extends CI_Model {
    public function get_kategori(){
        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function delete_kategori($id){
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    public function get_kategoribyid($id){
        $this->db->where('id_kategori',$id);
        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function update_kategori($id){
        $this->db->where('id_kategori',$id);
        $query = $this->db->update('kategori');
    }
}