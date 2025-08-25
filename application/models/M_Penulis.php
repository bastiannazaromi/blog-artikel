<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Penulis extends CI_Model
{
	public function getAllPenulis()
	{
		$this->db->order_by('username', 'asc');

		return $this->db->get('Tb_penulis')->result();
	}

	public function insertPenulis($data)
	{
		return $this->db->insert('Tb_penulis', $data);
	}

	public function getPenulisById($id)
	{
		return $this->db->get_where('Tb_penulis', ['id_penulis' => $id])->row();
	}

	public function updatePenulis($id, $data)
	{
		$this->db->where('id_penulis', $id);
		return $this->db->update('Tb_penulis', $data);
	}

	public function deletePenulis($id)
	{
		$this->db->where('id_penulis', $id);
		return $this->db->delete('Tb_penulis');
	}
}

/* End of file M_Penulis.php */
