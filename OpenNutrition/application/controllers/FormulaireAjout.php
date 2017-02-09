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
    }

    function index() {
        //Including validation library
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //Validating Name Field
        $this->form_validation->set_rules('dnom', 'Nom', 'required|min_length[2]|max_length[30]');

        //Validating Email Field
        $this->form_validation->set_rules('dprix', 'Prix', 'required|');

        //Validating Mobile no. Field
        $this->form_validation->set_rules('dnote5C', 'Note 5C', 'required|');

        //Validating Address Field
        $this->form_validation->set_rules('dnoteCO2', 'Note CO2', 'required|');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Header_view');
            $this->load->view('NavGauche_view');
            $this->load->view('AjouterPlat_view');
            $this->load->view('Footer_view');
        } else {
            //Setting values for tabel columns
            $data = array(
                'nomPlat' => $this->input->post('dnom'),
                'prixPlat' => $this->input->post('dprix'),
                'note5C' => $this->input->post('dnote5C'),
                'noteCO2' => $this->input->post('dnoteCO2')
            );
            //Transfering data to Model
            $this->Ajouter_model->db_insert($data);
            $data['message'] = 'Data Inserted Successfully';

            //Loading View
            $this->load->view('Header_view');
            $this->load->view('NavGauche_view');
            $this->load->view('AjouterPlat_view', $data);
            $this->load->view('Footer_view');
        }
    }

}
