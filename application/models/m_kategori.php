<?php

class m_kategori extends CI_Model {
    public function get_kategori(){
        $query = $this->db->get('kategori');
        return $query->result();
    }
}