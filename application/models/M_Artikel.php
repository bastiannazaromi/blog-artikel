<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Artikel extends CI_Model
{
	public function getAllArtikel($where = null)
	{
		$this->db->select('Tb_artikel.*, Tb_penulis.username as penulis');
		$this->db->join('Tb_penulis', 'Tb_artikel.id_penulis = Tb_penulis.id_penulis', 'inner');

		if ($where) {
			$this->db->where($where);
		}

		$this->db->order_by('Tb_artikel.judul_artikel', 'asc');

		return $this->db->get('Tb_artikel')->result();
	}

	public function insertArtikel($data)
	{
		return $this->db->insert('Tb_artikel', $data);
	}

	public function getArtikelById($id)
	{
		$this->db->select('Tb_artikel.*,  Tb_penulis.username as penulis');
		$this->db->join('Tb_penulis', 'Tb_artikel.id_penulis = Tb_penulis.id_penulis', 'inner');

		return $this->db->get_where('Tb_artikel', ['Tb_artikel.id' => $id])->row();
	}

	public function updateArtikel($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('Tb_artikel', $data);
	}

	public function deleteArtikel($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('Tb_artikel');
	}

	public function getCountArtikel($where = null)
	{
		if ($where) {
			$this->db->where($where);
		}

		return $this->db->get('Tb_artikel')->num_rows();
	}
}
