<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{
	public function cekLogin($username, $password)
	{
		$this->db->where('username LIKE binary', $username);

		$data = $this->db->get('Tb_admin')->row();

		if ($data) {
			if ($password == $data->password) {
				$login = array(
					'is_logged_in' => true,
					'data'         => $data,
					'role'         => 'admin'
				);

				if ($login) {
					$this->session->set_userdata('user_login', $login);
					return 'sukses';
				}
			} else {
				return 'Password Salah';
			}
		} else {
			$this->db->where('username LIKE binary', $username);

			$data = $this->db->get('Tb_penulis')->row();

			if ($data) {
				if ($data->status == 0) {
					return 'Penulis tidak aktif';
				} else if ($password == $data->password) {
					$login = array(
						'is_logged_in' => true,
						'data'         => $data,
						'role'         => 'penulis'
					);

					if ($login) {
						$this->session->set_userdata('user_login', $login);
						return 'sukses';
					}
				} else {
					return 'Password Salah';
				}
			} else {
				return 'Username tidak terdaftar';
			}
		}
	}
}

/* End of file M_Login.php */
