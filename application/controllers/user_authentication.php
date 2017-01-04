<?php
// Begin DWFE
session_start(); //nous devons démarrer la session afin d'y accéder via CI

Class User_Authentication extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');


		$this->load->model('login_database');
	}

// Afficher la page de connexion
	public function index() {
		$this->load->view('login_form');
	}

// Afficher la page d'inscription
	public function user_registration_show() {
		$this->load->view('registration_form');
	}

// Valider et stocker les données d'enregistrement dans la base de données
	public function new_user_registration() {

// Vérifier la validation les données entrées par l'utilisateur
		$this->form_validation->set_rules('username', 'Nom d\'utilisateur', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registration_form');
		} else {

			$data = array(
				'user_name' => $this->input->post('username'),
				'user_email' => $this->input->post('email_value'),
				'user_password' => $this->input->post('password')
				);
			$result = $this->login_database->registration_insert($data);

			if ($result == TRUE) {
				$data['message_display'] = 'Inscription réussie !';
				$this->load->view('login_form', $data);
			} else {
				$data['message_display'] = 'Nom d\'utilisateur existe déjà!';
				$this->load->view('registration_form', $data);
			}
		}
	}

// Vérifier la connexion de l'utilisateur
	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Nom d\'utilisateur', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
					$this->load->view('template/header');
                    $this->load->view('body');
                    $this->load->view('template/footer');
				}
		else{
				$this->load->view('login_form');
			}
		    }else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);


			$result = $this->login_database->login($data);


			if ($result == TRUE) {

				$username = $this->input->post('username');
				$result = $this->login_database->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $result[0]->user_name,
						'email' => $result[0]->user_email,
						);
// Ajouter des données utilisateur à la session

					$this->session->set_userdata('logged_in', $session_data);
			$this->load->view('template/header');
$this->load->view('body');
$this->load->view('template/footer');
				}
			} else {
				$data = array(
					'error_message' => 'Nom d\'utilisateur ou mot de passe non valide'
					);
				$this->load->view('login_form', $data);
			}
		}
	}

// Déconnexion de la page d'administration
	public function logout() {

// Suppression de données de la session
		
		$sess_array = array(
			'username' => ''
			);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Déconnexion réussie';
		$this->load->view('login_form', $data);
	}

}
// End DWFE
?>