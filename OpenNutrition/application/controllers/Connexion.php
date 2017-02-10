<?php

class Connexion extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        
        	$this->load->view('Header_view');
                $this->load->view('NavGauche_view');
		$this->load->view('Login_view');
		$this->load->view('Footer_view');
        
    }

}
