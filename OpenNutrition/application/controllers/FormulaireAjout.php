<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FormulaireAjout extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
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
        //Including validation library
        

        $data["PlatCrous"] = $this->PlatCrous->getPlatCrous();


        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');


        $this->form_validation->set_rules('add-nomPlat', 'Nom', 'required|min_length[2]|max_length[30]');

        $this->form_validation->set_rules('add-prixPlat', 'Prix', 'required');

        $this->form_validation->set_rules('options-type', 'Type plat', 'required');

        $this->form_validation->set_rules('options-note', 'Note 5C', 'required');

        $this->form_validation->set_rules('add-noteCO2', 'Note CO2', 'required');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Header_view');
            $this->load->view('Nav_view_form');
            $this->load->view('NavGauche_view');
            $this->load->view('AjouterPlat_view', $data);
            $this->load->view('Footer_view');
        } else {
            //Setting values for table columns
            $dataInsert = array(
                'nomPlat' => $this->input->post('add-nomPlat'),
                'prixPlat' => $this->input->post('add-prixPlat'),
                'typePlat' => $this->input->post('options-type'),
                'note5C' => $this->input->post('options-note'),
                'noteCO2' => $this->input->post('add-noteCO2')
            );
            //Transfering data to Model
            $this->Ajouter_model->db_insert($dataInsert);
            $data['message'] = 'Data Inserted Successfully';

            //Loading View
            $this->load->view('Header_view');
            $this->load->view('Nav_view_form');
            $this->load->view('NavGauche_view');
            $this->load->view('AjouterPlat_view', $data);
            $this->load->view('Footer_view');
        }
    }

}
