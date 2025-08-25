<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Komentar extends CI_Model
{
	public function getAllKomentar($where = null)
	{
		$this->db->select('Tb_detail.*, Tb_artikel.judul_artikel, Tb_artikel.isi_artikel, Tb_komentar.nama, Tb_komentar.isi_komentar, Tb_komentar.email, Tb_komentar.id as id_komentar');
		$this->db->join('Tb_artikel', 'Tb_artikel.id = Tb_detail.id_artikel', 'inner');
		$this->db->join('Tb_komentar', 'Tb_komentar.id = Tb_detail.id_komentar', 'inner');

		if ($where) {
			$this->db->where($where);
		}

		$this->db->order_by('Tb_detail.id', 'DESC');

		return $this->db->get('Tb_detail')->result();
	}
}

/* End of file M_Peminjaman.php */
