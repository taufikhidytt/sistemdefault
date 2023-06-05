<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('kategori_barang');
        if($id)
        {
            $this->db->where('id_kategori', $id);
        }
        $data = $this->db->get();
        return $data;
    }

    public function add($data)
    {
        $params = array(
            'nama_kategori' => htmlspecialchars($data['kategori_barang']),
        );
        $this->db->insert('kategori_barang', $params);
    }

    public function ubah($data)
    {
        $params = array(
            'nama_kategori' => htmlspecialchars($data['nama_kategori']),
        );
        $this->db->where('id_kategori', $data['id_kategori']);
        $this->db->update('kategori_barang', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_kategori', $id['id_kategori']);
        $this->db->delete('kategori_barang');
    }

    public function sortir($data)
    {
        if($data['sortir'] != ''){
            $this->db->where('jenis_barang', $data['sortir']);
        }
        $this->db->from('barang');
        $data = $this->db->get();
        return $data;
    }
}

?>