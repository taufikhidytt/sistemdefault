<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.id_kategori');
        if($id)
        {
            $this->db->where('barang.id', $id);
        }
        $this->db->order_by('barang.id');
        $data = $this->db->get();
        return $data;
    }

    public function add($data)
    {
        $params = array(
            'nama_barang' => htmlspecialchars($data['nama_barang']),
            'harga_barang' => htmlspecialchars($data['harga_barang']),
            'id_kategori' => htmlspecialchars($data['kategori_barang']),
        );
        $this->db->insert('barang', $params);
    }

    public function ubah($data)
    {
        $params = array(
            'nama_barang' => htmlspecialchars($data['nama_barang']),
            'harga_barang' => htmlspecialchars($data['harga_barang']),
            'id_kategori' => htmlspecialchars($data['kategori_barang']),
        );
        $this->db->where('id', $data['id']);
        $this->db->update('barang', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id['id']);
        $this->db->delete('barang');
    }

    public function sortir($data)
    {
        if($data['sortir'] != ''){
            $this->db->where('barang.id_kategori', $data['sortir']);
        }
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.id_kategori');
        $data = $this->db->get();
        return $data;
    }
}

?>