<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!empty($this->session->userdata('user_login'))) {
			if ($this->uri->segment(2) != 'logout') {
				$this->session->set_flashdata('error', 'Anda sudah login');
				redirect('dashboard', 'refresh');
			}
		}

		$this->load->model('M_Login', 'login');
	}

	public function index()
	{
		$data = [
			'title' => 'Halaman Login'
		];

		$this->load->view('login', $data);
	}

	public function proses()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]', [
			'required'   => 'Username tidak boleh kosong !',
			'min_length' => 'Username kurang dari 5'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
			'required'   => 'Password harap di isi !',
			'min_length' => 'Password kurang dari 8'
		]);

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('login', 'refresh');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->login->cekLogin($username, $password);

			if ($cek == 'sukses') {
				$this->session->set_flashdata('success', 'Login sukses');

				redirect('dashboard', 'refresh');
			} else {
				$this->session->set_flashdata('error', $cek);
				redirect('login', 'refresh');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}

/* End of file Login.php */
