<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('toastr-error', 'Anda belum login');

			redirect('login', 'resfresh');
		}

		$this->load->model('M_Artikel', 'artikel');
		$this->load->model('M_Penulis', 'penulis');
	}

	public function index()
	{
		if ($this->session->userdata('user_login')['role'] == 'admin') {
			$where = null;
		} else {
			$where = [
				'Tb_artikel.id_penulis' => $this->session->userdata('user_login')['data']->id_penulis
			];
		}

		$artikel = $this->artikel->getAllArtikel($where);

		$data = [
			'title'   => 'Data Artikel',
			'page'    => 'artikel/v_artikel',
			'artikel' => $artikel
		];

		$this->load->view('layout/index', $data);
	}

	public function add()
	{
		$data = [
			'title'   => 'Tambah Artikel',
			'page'    => 'artikel/v_addArtikel',
			'penulis' => $this->penulis->getAllPenulis()
		];

		$this->load->view('layout/index', $data);
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required', [
			'required' => 'Judul artikel harus diisi!'
		]);
		$this->form_validation->set_rules('id_penulis', 'Penulis', 'required', [
			'required' => 'Penulis harus diisi!'
		]);
		$this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'required', [
			'required' => 'Isi artikel harus diisi!'
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
			'required'     => 'Tanggal harus diisi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'judul_artikel' => $this->input->post('judul_artikel'),
				'isi_artikel'   => $this->input->post('isi_artikel'),
				'tanggal'       => $this->input->post('tanggal'),
				'id_penulis'    => $this->input->post('id_penulis'),
			];

			$insert = $this->artikel->insertArtikel($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('artikel', 'refresh');
		}
	}

	public function edit($id)
	{
		$artikel = $this->artikel->getArtikelById($id);
		if (!$artikel) {
			show_404();
		}

		$data = [
			'title'   => 'Edit Artikel',
			'page'    => 'artikel/v_editArtikel',
			'artikel' => $artikel,
			'penulis' => $this->penulis->getAllPenulis()
		];

		$this->load->view('layout/index', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required', [
			'required' => 'Judul artikel harus diisi!'
		]);
		$this->form_validation->set_rules('id_penulis', 'Penulis', 'required', [
			'required' => 'Penulis harus diisi!'
		]);
		$this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'required', [
			'required' => 'Isi artikel harus diisi!'
		]);
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
			'required'     => 'Tanggal harus diisi!'
		]);

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'judul_artikel' => $this->input->post('judul_artikel'),
				'isi_artikel'   => $this->input->post('isi_artikel'),
				'tanggal'       => $this->input->post('tanggal'),
				'id_penulis'    => $this->input->post('id_penulis'),
			];

			$update = $this->artikel->updateArtikel($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('artikel', 'refresh');
		}
	}

	public function delete($id)
	{
		$delete = $this->artikel->deleteArtikel($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('artikel', 'refresh');
	}
}
