<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model', 'kategori');
		$this->load->helper('rules');
	}

	public function index()
	{
		$data['title'] = 'Kategori Barang';
		$data['judul'] = 'Kategori Barang';
		$data['kategori'] = $this->kategori->getData();
		$this->template->load('template', 'index', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Add Kategori Barang';
			$data['judul'] = 'Add Kategori Barang';
			$this->template->load('template', 'tambah', $data);
		} else {
			$data = $this->input->post(null, true);
			$this->kategori->add($data);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
				redirect('kategori');
			}else{
				$this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
				redirect('kategori');
			}
		}
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		if ($this->form_validation->run() == FALSE) {
			$query = $this->kategori->getData($id);
			if($query->num_rows() > 0){
				$data['title'] = 'Ubah Data Kategori Barang';
				$data['judul'] = 'Ubah Data Kategori Barang';
				$data['data'] = $query->row();
				$this->template->load('template', 'ubah', $data);
			}else{
				$this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
				redirect('kategori');
			}
		} else {
			$data = $this->input->post(null, true);
			$this->kategori->ubah($data);
			if($this->db->affected_rows() > 0)
			{
				$this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
				redirect('kategori');
			}else{
				$this->session->set_flashdata('warning', 'Anda Tidak Mengupdate Data');
				redirect('kategori');
			}
		}
	}

	public function del()
	{
		$id = $this->input->post(null, true);
		$this->kategori->delete($id);
		if($this->db->affected_rows() > 0 )
		{
			$this->session->set_flashdata('success', 'Selamat Anda Berhasil Menghapus Data');
			redirect('kategori');
		}else{
			$this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
			redirect('kategori');
		}
	}
}
