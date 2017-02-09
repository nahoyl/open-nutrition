<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
    public function __construct() {
        parent::__construct();
        $this->load->model('PlatCrous_model', 'PlatCrous', TRUE);
    }
	public function index()
	{
            $data["EntreeCrous"] = $this->PlatCrous->getPlatCrousEntree();
            $data["PlatCrous"] = $this->PlatCrous->getPlatCrousPlat();
            $data["DessertCrous"] = $this->PlatCrous->getPlatCrousDessert();
            
            
		$this->load->view('Header_view');
                $this->load->view('Nav_view');
                $this->load->view('NavGauche_view');
		$this->load->view('Accueil_view',$data);
		$this->load->view('Footer_view');
	}
        
        
        public function getAllergeneIngredient($plat)
	{
            // enlever les espaces
            $plat= str_replace("%20", " ", $plat);
            //$plat= $this->input->post('plat');
            $data["allergene"] = $this->PlatCrous->getPlatAllergene($plat);
            $data["nomPlat"] = $plat ;
            $data["notePlat"] = $this->PlatCrous->getPlatNote($plat) ;
            $this->load->view('Description_view',$data);
	}
            
           
}
