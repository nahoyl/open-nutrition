<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Formulaire extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct() {
        parent::__construct();
        $this->load->model('PlatCrous_model', 'PlatCrous', TRUE);

    }

    function index() {
        //Verifie qu'on est connecter
        $this->estConnecter();
        
        $data["PlatCrous"] = $this->PlatCrous->getPlatCrous();
        $data["Allergenes"] = $this->PlatCrous->getAllergene();
        $this->lancerVueFormulaire($data);

    }

    public function submitAjout(){
        //Verifie qu'on est connecter
        $this->estConnecter();
        
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('i-nomPlat', 'Nom', 'trim|required|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('i-prixPlat', 'Prix', 'trim|required');
        $this->form_validation->set_rules('i-noteCO2', 'Note CO2', 'trim|required');

        $this->form_validation->set_rules('i-de', 'Densité énergétique', 'required');
        $this->form_validation->set_rules('i-gs', 'Graisses saturées', 'required');
        $this->form_validation->set_rules('i-ss', 'Sucres simples', 'required');
        $this->form_validation->set_rules('i-s', 'Sodium', 'required');
        $this->form_validation->set_rules('i-fln', 'Fruits Légumes et noix', 'required');
        $this->form_validation->set_rules('i-f', 'Fibres', 'required');
        $this->form_validation->set_rules('i-p', 'Protéines', 'required');

        $this->form_validation->set_rules('options-type', 'Type plat', 'required');

        $this->form_validation->set_rules('tab-composition[]', 'Composition', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data["PlatCrous"] = $this->PlatCrous->getPlatCrous();
            $data["Allergenes"] = $this->PlatCrous->getAllergene();
            $data['message'] = 'Certain champs ne sont pas remplit';
            $data['insertionReussie'] = FALSE;

            $this->lancerVueFormulaire($data);

        } 
        else {
            
            //Calcule de la note5C
            $note5C = $this->PlatCrous->calculNote(
                $this->input->post('i-de'), 
                $this->input->post('i-gs'), 
                $this->input->post('i-ss'), 
                $this->input->post('i-s'), 
                $this->input->post('i-fln'), 
                $this->input->post('i-f'), 
                $this->input->post('i-p')
            );

            // Insertion des données du plat
            $dataPlat = array(
                'nomPlat' => $this->input->post('i-nomPlat'),
                'prixPlat' => $this->input->post('i-prixPlat'),
                'typePlat' => $this->input->post('options-type'),
                'note5C' => $note5C,
                'noteCO2' => $this->input->post('i-noteCO2')
            );

            if(!$this->PlatCrous->platCrousExiste($dataPlat['nomPlat'])){

                $this->PlatCrous->db_insertPlat($dataPlat);

                // Insertion de la composition du plat
                $dataCompositionTmp = $this->input->post('tab-composition');
      
                foreach ($dataCompositionTmp as $key => $value) {
                    $dataComposition = array(
                        'nomPlat' => $this->input->post('i-nomPlat'),
                        'nomCompo' => $value 
                    );
                    $this->PlatCrous->db_insertCompoPlat($dataComposition);
                }

                // Insertion des allergènes du plat
                $dataAllergeneTmp = $this->input->post('tab-allergene');
      
                if (!empty($dataAllergene)) {
        
                    foreach ($dataAllergeneTmp as $key => $value) {
                        $dataAllergene = array(
                            'nomPlat' => $this->input->post('i-nomPlat'),
                            'nomAllergene' => $value 
                        );
                        $this->PlatCrous->db_insertPlatAllergene($dataAllergene);
                    }
                }

                // Mise à jour des données à afficher
                $data["PlatCrous"] = $this->PlatCrous->getPlatCrous();
                $data["Allergenes"] = $this->PlatCrous->getAllergene();
                $data['message'] = 'Plat ajouté avec succès';
                $data['insertionReussie'] = TRUE;

                //Lancer la vue
                $this->lancerVueFormulaire($data);
            }
            else{
                $data["PlatCrous"] = $this->PlatCrous->getPlatCrous();
                $data["Allergenes"] = $this->PlatCrous->getAllergene();
                $data['message'] = 'Le nom du plat est déjà utilisé';
                $data['insertionReussie'] = FALSE;

                $this->lancerVueFormulaire($data);
            }


        }
    }

    public function submitSuppr(){
        //Verifie qu'on est connecter
        $this->estConnecter();
        
        $this->PlatCrous->db_deleteplat($this->input->post('suppression'));

        $data["PlatCrous"] = $this->PlatCrous->getPlatCrous();
        $data["Allergenes"] = $this->PlatCrous->getAllergene();
        $this->lancerVueFormulaire($data);

    }

    private function lancerVueFormulaire($data){
        $this->load->view('Header_view');
        $this->load->view('Nav_view_form');
        $this->load->view('NavGauche_view');
        $this->load->view('AjouterPlat_view', $data);
        $this->load->view('Footer_view');
    }
    
    
    
    private function estConnecter() {
            //fonction qui verifie qu'on est connecter 
        if (empty($this->session->userdata("identifiant"))) {
            redirect('Welcome');
        }
    }

}
