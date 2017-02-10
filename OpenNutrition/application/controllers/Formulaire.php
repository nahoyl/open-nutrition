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
        $this->load->model('Ajouter_model');
        $this->load->model('PlatCrous_model', 'PlatCrous', TRUE);

    }

    function index() {
        
        $data["PlatCrous"] = $this->PlatCrous->getPlatCrous();
        $this->lancerVueFormulaire($data);

    }

    public function submitAjout(){
        
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('i-nomPlat', 'Nom', 'required|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('i-prixPlat', 'Prix', 'required');
        $this->form_validation->set_rules('i-noteCO2', 'Note CO2', 'required');

        $this->form_validation->set_rules('i-de', 'Densité énergétique', 'required');
        $this->form_validation->set_rules('i-gs', 'Graisses saturées', 'required');
        $this->form_validation->set_rules('i-ss', 'Sucres simples', 'required');
        $this->form_validation->set_rules('i-s', 'Sodium', 'required');
        $this->form_validation->set_rules('i-fln', 'Fruits Légumes et noix', 'required');
        $this->form_validation->set_rules('i-f', 'Fibres', 'required');
        $this->form_validation->set_rules('i-p', 'Protéines', 'required');

        $this->form_validation->set_rules('options-type', 'Type plat', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo "Erreur validation";
        } else {
            
            //Setting values for table columns
            $note5C = $this->PlatCrous->calculNote(
                $this->input->post('i-de'), 
                $this->input->post('i-gs'), 
                $this->input->post('i-ss'), 
                $this->input->post('i-s'), 
                $this->input->post('i-fln'), 
                $this->input->post('i-f'), 
                $this->input->post('i-p')
            );

            $data = array(
                'nomPlat' => $this->input->post('i-nomPlat'),
                'prixPlat' => $this->input->post('i-prixPlat'),
                'typePlat' => $this->input->post('options-type'),
                'note5C' => $note5C,
                'noteCO2' => $this->input->post('i-noteCO2')
            );

            //Transfering data to Model
            $this->Ajouter_model->db_insertPlat($data);

            $dataCompositionTmp = $this->input->post('tab-composition');
  
            foreach ($dataCompositionTmp as $key => $value) {
                $dataComposition = array(
                    'nomPlat' => $this->input->post('i-nomPlat'),
                    'nomCompo' => $value 
                );
                $this->Ajouter_model->db_insertCompoPlat($dataComposition);
            }

            $data['message'] = 'Data Inserted Successfully';
            //Loading View
            
            $this->lancerVueFormulaire($data);
        }
    }

    public function submitSuppr(){
        $this->Ajouter_model->db_deleteplat($this->input->post('suppression'));

        $data["PlatCrous"] = $this->PlatCrous->getPlatCrous();
        $this->lancerVueFormulaire($data);

    }

    private function lancerVueFormulaire($data){
        $this->load->view('Header_view');
        $this->load->view('Nav_view_form');
        $this->load->view('NavGauche_view');
        $this->load->view('AjouterPlat_view', $data);
        $this->load->view('Footer_view');
    }

}
