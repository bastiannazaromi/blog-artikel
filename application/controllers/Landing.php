<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Artikel', 'artikel');
		$this->load->model('M_Komentar', 'komentar');

		$this->load->helper('ba');
	}

	public function index()
	{
		$data = [
			'title'   => 'Blog Artikel',
			'page'    => 'landing/v_home',
			'artikel' => $this->artikel->getAllArtikel()
		];

		$this->load->view('index', $data);
	}

	public function artikel($id)
	{
		$artikel =  $this->artikel->getArtikelById($id);

		if (!$artikel) {
			show_404();
		}

		$data = [
			'title'    => 'Blog Artikel',
			'page'     => 'landing/v_artikel',
			'artikel'  => $artikel,
			'komentar' => $this->komentar->getAllKomentar([
				'Tb_artikel.id' => $id
			])
		];

		$this->load->view('index', $data);
	}

	public function komen()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('isi_komentar', 'Isi Komentar', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->artikel($this->input->post('id_artikel'));
		} else {
			$id = $this->input->post('id_artikel');

			$data = [
				'nama'         => $this->input->post('nama'),
				'email'        => $this->input->post('email'),
				'isi_komentar' => $this->input->post('isi_komentar')
			];

			$this->db->insert('Tb_komentar', $data);
			$insertId = $this->db->insert_id();

			if ($insertId) {
				$this->db->insert('Tb_detail', [
					'id_artikel'  => $id,
					'id_komentar' => $insertId
				]);
			}

			$this->session->set_flashdata('toastr-success', 'Komentar berhasil dikirim');

			redirect('detail/artikel/' . $id, 'refresh');
		}
	}
}

/* End of file Landing.php */
