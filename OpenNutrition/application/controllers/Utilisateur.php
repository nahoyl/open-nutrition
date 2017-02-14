<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Utilisateur_model', 'UtilisateurModel', TRUE);
    }

    function index() {
        $this->estConnecter();
        $data["Utilisateurs"] = $this->UtilisateurModel->getUtilisateur();
        $this->lancerVueUtilisateur($data);
    }

    public function submitAjout() {
        $this->estConnecter();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('i-nom', 'Nom', 'required|trim');
        $this->form_validation->set_rules('i-mdp1', 'Mot de passe', 'required|min_length[8]|trim');
        $this->form_validation->set_rules('i-mdp2', 'Confirmation du mot de passe', 'required|min_length[8]|trim|matches[i-mdp1]');
        $this->form_validation->set_rules('options-type', 'Type connexion', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo "Erreur validation";
            redirect('Utilisateur');
        } else {
            $nom = $this->input->post('i-nom');
            $prenom = $this->input->post('i-prenom');
            $type = $this->input->post('options-type');
            $mdp = $this->input->post('i-mdp1');

            $this->UtilisateurModel->insererUtilisateur($nom, $type, $mdp);
            redirect('Utilisateur');
        }
    }

    public function submitSuppr() {
        $this->estConnecter();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('suppression', 'Suppression', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo "Erreur validation";
            redirect('Utilisateur');
        } else {
            $nom = $this->input->post('suppression');
            $this->UtilisateurModel->supprimerUtilisateur($nom);
            redirect('Utilisateur');
        }
    }

    private function lancerVueUtilisateur($data) {
        $this->load->view('Header_view');
        $this->load->view('Nav_view_user');
        $this->load->view('NavGauche_view');
        $this->load->view('AjoutUtilisateur_view', $data);
        $this->load->view('Footer_view');
    }

    private function estConnecter() {
        if (empty($this->session->userdata("identifiant"))) {
            redirect('Welcome');
        }
        if ($this->encrypt->decode($this->session->userdata("open_nutrition")) != "administrateur") {
            redirect('Welcome');
        }
    }

}
