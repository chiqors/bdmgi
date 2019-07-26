<?php

class Bis_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_list($search = FALSE)
	{
		if ($search === FALSE) {
			$query = $this->db->get('bis');
			return $query->result();
		}
	}

	public function get_data($info)
	{
		$query = $this->db->get_where('bis', array('PlatNomor' => $info));
		return $query->row();
	}

	public function store()
	{
		$data = array(
			'IdBisJenis' => $this->input->post('IdBisJenis'),
			'NamaBis' => $this->input->post('NamaBis'),
			'Harga' => $this->input->post('Harga')
		);
		return $this->db->insert('bis', $data);
	}

	public function update($id)
	{
		$data = array(
			'IdBisJenis' => $this->input->post('IdBisJenis'),
			'NamaBis' => $this->input->post('NamaBis'),
			'Harga' => $this->input->post('Harga')
		);
		$this->db->where('PlatNomor', $id);
		return $this->db->update('bis', $data);
	}

	public function destroy($id)
	{
		$this->db->where('PlatNomor', $id);
		$this->db->delete('bis');
		return true;
	}

}