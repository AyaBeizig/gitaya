<?php
// Begin DWFE
Class Login_Database extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->database();

	}

// enregistrement
	public function registration_insert($data) {



// Requête pour vérifier si le nom d'utilisateur existe déjà ou non
		$condition = "user_name =" . "'" . $data['user_name'] . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$data['user_password']=md5($data['user_password']);

// Requête pour insérer des données dans la base de données
			$this->db->insert('user', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

// Lire les données à l'aide du nom d'utilisateur et son mot de passe
	public function login($data) {

		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . md5($data['password']) . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

// Lire les données de la base de données pour afficher les données dans la page d'administration
	public function read_user_information($username) {

		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

}
//End DWFE
?>