<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('toastr-error', 'Anda belum login');

			redirect('login', 'refresh');
		}

		$this->load->model('M_Komentar', 'komentar');
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

		$data = [
			'title'    => 'List Komentar',
			'page'     => 'komentar/v_komentar',
			'komentar' => $this->komentar->getAllKomentar($where)
		];

		$this->load->view('layout/index', $data);
	}

	public function delete($id_komentar)
	{
		$this->db->delete('Tb_detail', ['id_komentar' => $id_komentar]);
		$delete = $this->db->delete('Tb_komentar', ['id' => $id_komentar]);

		if ($delete) {
			$this->db->delete('Tb_detail', ['id_komentar' => $id_komentar]);

			$this->session->set_flashdata('toastr-success', 'Data berhasil dihapus!');
		} else {
			$this->session->set_flashdata('toastr-error', 'Data gagal dihapus!');
		}

		redirect('komentar', 'refresh');
	}
}

/* End of file Peminjaman.php */
