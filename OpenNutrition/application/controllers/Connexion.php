<?php

class Connexion extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->model('Utilisateur_model', 'utilisateur', TRUE);
    }

    public function index() {

        $this->load->view('Header_view');
        $this->load->view('NavLogin_view');
        $this->load->view('NavGauche_view');
        $this->load->view('Login_view');
        $this->load->view('Footer_view');
    }

    public function seConnecter() {

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('i-identifiant', 'Identifiant', 'required');
        $this->form_validation->set_rules('i-mdp', 'Mot de passe', 'required|min_length[8]|max_length[30]');
        $this->form_validation->set_rules('type-user', 'Type connexion', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo "Erreur validation";
        } else {
            $mdp = $this->input->post('i-mdp');
            $identifiant = $this->input->post('i-identifiant');
            $typeConnexion = $this->input->post('type-user');

            $existeUtilisateur = $this->utilisateur->seConnecter($identifiant, $mdp, $typeConnexion);

            if ($existeUtilisateur == TRUE) {
                $this->ajouterUneSession($identifiant, $mdp, $typeConnexion);
                redirect('Welcome');
            } else {
                redirect('Welcome');
                echo 'erreur';
            }
        }
    }

    public function deco() {
        $this->session->sess_destroy();
        redirect('Welcome');
    }

    private function ajouterUneSession($identifiant, $mdp, $typeConnexion) {
        $this->session->set_userdata("identifiant", $identifiant);
        $this->session->set_userdata("open_nutrition_date", date("l"));
        $this->session->set_userdata("open_nutrition_id", $this->encrypt->encode($typeConnexion));
        
        if ($typeConnexion == "administrateur") {
            $this->session->set_userdata("open_nutrition", $this->encrypt->encode($typeConnexion));
        } else if ($typeConnexion == "utilisateur") {
            
        }
    }

}
