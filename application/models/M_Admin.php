<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{
	public function getAllAdmin()
	{
		$this->db->order_by('username', 'asc');

		return $this->db->get('Tb_admin')->result();
	}

	public function insertAdmin($data)
	{
		return $this->db->insert('Tb_admin', $data);
	}

	public function getAdminByUsername($username)
	{
		return $this->db->get_where('Tb_admin', ['username' => $username])->row();
	}

	public function updateAdmin($username, $data)
	{
		$this->db->where('username', $username);
		return $this->db->update('Tb_admin', $data);
	}

	public function deleteAdmin($username)
	{
		$this->db->where('username', $username);
		return $this->db->delete('Tb_admin');
	}
}

/* End of file M_User.php */
