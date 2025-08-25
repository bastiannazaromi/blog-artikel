<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('M_Penulis', 'penulis');
	}

	public function index()
	{
		$data = [
			'title' => 'Halaman Registrasi'
		];

		$this->load->view('register', $data);
	}

	function proses()
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
			$this->session->set_flashdata('error', validation_errors());
			redirect('register', 'refresh');
		} else {
			$data = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			];

			$insert = $this->penulis->insertPenulis($data);

			if ($insert) {
				$this->session->set_flashdata('success', 'Registrasi berhasil!');
			} else {
				$this->session->set_flashdata('error', 'Registrasi gagal!');
			}

			redirect('register', 'refresh');
		}
	}
}

/* End of file Register.php */
