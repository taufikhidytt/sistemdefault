<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Barang_model', 'barang');
		$this->load->model('kategori/Kategori_model', 'kategori');
		$this->load->helper('rules');
	}

	public function index()
	{
		$param = $this->input->post(null, true);
		$data['title'] = 'Data Barang';
		$data['judul'] = 'Data Barang';
		$data['kategori'] = $this->kategori->getData();
		if($param){
			$data['barang'] = $this->barang->sortir($param);
		}else{
			$data['barang'] = $this->barang->getData();
		}
		$this->template->load('template', 'index', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');
		$this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Add Data';
			$data['judul'] = 'Add Data';
			$data['kategori'] = $this->kategori->getData();
			$this->template->load('template', 'tambah', $data);
		} else {
			$data = $this->input->post(null, true);
			$this->barang->add($data);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
				redirect('barang');
			}else{
				$this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
				redirect('barang');
			}
		}
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');
		$this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		if ($this->form_validation->run() == FALSE) {
			$query = $this->barang->getData($id);
			if($query->num_rows() > 0){
				$data['title'] = 'Ubah Data';
				$data['judul'] = 'Ubah Data';
				$data['kategori'] = $this->kategori->getData();
				$data['data'] = $query->row();
				$this->template->load('template', 'ubah', $data);
			}else{
				$this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
				redirect('barang');
			}
		} else {
			$data = $this->input->post(null, true);
			$this->barang->ubah($data);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
				redirect('barang');
			}else{
				$this->session->set_flashdata('warning', 'Anda Tidak Mengupdate Data');
				redirect('barang');
			}
		}
	}

	public function del()
	{
		$id = $this->input->post(null, true);
		$this->barang->delete($id);
		if($this->db->affected_rows() > 0 )
		{
			$this->session->set_flashdata('success', 'Selamat Anda Berhasil Menghapus Data');
			redirect('barang');
		}else{
			$this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
			redirect('barang');
		}
	}
}
