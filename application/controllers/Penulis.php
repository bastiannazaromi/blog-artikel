<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penulis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('toastr-error', 'Anda belum login');

			redirect('login', 'refresh');
		}

		if ($this->session->userdata('user_login')['role'] != 'admin') {
			$this->session->set_flashdata('toastr-error', 'Anda bukan admin');

			redirect('dashboard', 'refresh');
		}

		$this->load->model('M_Penulis', 'penulis');
	}

	public function index()
	{
		$data = [
			'title'   => 'Penulis',
			'page'    => 'penulis/v_penulis',
			'penulis' => $this->penulis->getAllPenulis()
		];

		$this->load->view('layout/index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Penulis',
			'page'  => 'penulis/v_addPenulis'
		];

		$this->load->view('layout/index', $data);
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[Tb_penulis.username]|max_length[50]', [
			'required'   => 'Username harus diisi!',
			'is_unique'  => 'Username sudah terdaftar!',
			'max_length' => 'Username maksimal terdiri dari 50 angka!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[10]', [
			'required'   => 'Password harus diisi!',
			'max_length' => 'Password maksimal terdiri dari 10 angka!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			];

			$insert = $this->penulis->insertPenulis($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('penulis', 'refresh');
		}
	}

	public function edit($id)
	{
		$penulis = $this->penulis->getPenulisById($id);
		if (!$penulis) {
			show_404();
		}

		$data = [
			'title'   => 'Edit Penulis',
			'page'    => 'penulis/v_editPenulis',
			'penulis' => $penulis
		];

		$this->load->view('layout/index', $data);
	}

	public function update()
	{
		$id = $this->input->post('id');

		$penulis = $this->penulis->getPenulisById($id);

		if ($this->input->post('username') != $penulis->username) {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[Tb_penulis.username]|max_length[50]', [
				'required'   => 'Username harus diisi!',
				'is_unique'  => 'Username sudah terdaftar!',
				'max_length' => 'Username maksimal terdiri dari 50 angka!'
			]);
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required|max_length[50]', [
				'required'   => 'Username harus diisi!',
				'max_length' => 'Username maksimal terdiri dari 50 angka!'
			]);
		}
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[10]', [
			'required'   => 'Password harus diisi!',
			'max_length' => 'Password maksimal terdiri dari 10 angka!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->edit($id);
		} else {
			$data = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			];

			$update = $this->penulis->updatePenulis($id, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('penulis', 'refresh');
		}
	}

	public function delete($id)
	{
		$delete = $this->penulis->deletePenulis($id);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('penulis');
	}

	public function status($id_penulis, $status)
	{
		$data = [
			'status' => $status
		];

		$update = $this->penulis->updatePenulis($id_penulis, $data);

		if ($update) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
		}

		redirect('penulis', 'refresh');
	}
}
