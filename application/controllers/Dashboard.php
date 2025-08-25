<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('error', 'Anda belum login');

			redirect('login', 'refresh');
		}

		$this->load->model('M_Artikel', 'artikel');
	}

	public function index()
	{
		if ($this->session->userdata('user_login')['role'] != 'admin') {
			$where = [
				'id_penulis' => $this->session->userdata('user_login')['data']->id_penulis
			];
		} else {
			$where = null;
		}

		$data = [
			'title'   => 'Dashboard',
			'page'    => 'dashboard/dashboard',
			'artikel' => $this->artikel->getCountArtikel($where)
		];

		$this->load->view('layout/index', $data);
	}
}
