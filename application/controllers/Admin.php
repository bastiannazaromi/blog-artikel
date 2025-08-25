<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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

		$this->load->model('M_Admin', 'admin');
	}

	public function index()
	{
		$data = [
			'title' => 'List Admin',
			'page'  => 'admin/v_admin',
			'admin' => $this->admin->getAllAdmin()
		];

		$this->load->view('layout/index', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Tambah Admin',
			'page'  => 'admin/v_addAdmin'
		];

		$this->load->view('layout/index', $data);
	}

	public function postAdd()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[Tb_admin.username]|max_length[25]', [
			'required'   => 'Username harus diisi!',
			'is_unique'  => 'Username sudah terdaftar!',
			'max_length' => 'Username maksimal terdiri dari 25 angka!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[25]', [
			'required'   => 'Password harus diisi!',
			'max_length' => 'Password maksimal terdiri dari 25 angka!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->add();
		} else {
			$data = [
				'username' => str_replace(' ', '', $this->input->post('username')),
				'password' => $this->input->post('password'),
			];

			$insert = $this->admin->insertAdmin($data);

			if ($insert) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil ditambahkan!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal ditambahkan!');
			}

			redirect('admin', 'refresh');
		}
	}

	public function edit($username)
	{
		$user = $this->admin->getAdminByUsername($username);
		if (!$user) {
			show_404();
		}

		$data = [
			'title' => 'Edit admin',
			'page'  => 'admin/v_editAdmin',
			'admin' => $user
		];

		$this->load->view('layout/index', $data);
	}

	public function update()
	{
		$username = $this->input->post('username');
		$old      = $this->admin->getAdminByUsername($username);

		$this->form_validation->set_rules('password', 'Password', 'required|max_length[25]', [
			'required'   => 'Password harus diisi!',
			'max_length' => 'Password maksimal terdiri dari 25 angka!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->edit($username);
		} else {
			$data = [
				'password' => $this->input->post('password'),
			];
			$update = $this->admin->updateAdmin($username, $data);

			if ($update) {
				$this->session->set_flashdata('toastr-success', 'Data berhasil diubah!');
			} else {
				$this->session->set_flashdata('toastr-error', 'Data gagal diubah!');
			}

			redirect('admin', 'refresh');
		}
	}

	public function delete($username)
	{
		$delete = $this->admin->deleteAdmin($username);

		if ($delete) {
			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('admin', 'refresh');
	}
}
