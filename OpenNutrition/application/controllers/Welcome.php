<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
    public function __construct() {
        parent::__construct();
        $this->load->model('PlatCrous_model', 'PlatCrous', TRUE);
    }

    public function index() {
        $data["EntreeCrous"] = $this->PlatCrous->getPlatCrousEntree();
        $data["PlatCrous"] = $this->PlatCrous->getPlatCrousPlat();
        $data["DessertCrous"] = $this->PlatCrous->getPlatCrousDessert();


        $this->load->view('Header_view');
        $this->load->view('Nav_view');
        $this->load->view('NavGauche_view');
        $this->load->view('Accueil_view', $data);
        $this->load->view('Footer_view');
    }

    public function getAllergeneCO2($plat) {
        // enlever les espaces
        $plat = str_replace("%20", " ", $plat);
        $plat = str_replace("%C3%A9", "é", $plat);
        $data["allergene"] = $this->PlatCrous->getPlatAllergene($plat);
        $data["Co2"] = $this->PlatCrous->getPlatCo2($plat);
        $data["nomPlat"] = $plat;
        $data["notePlat"] = $this->PlatCrous->getPlatNote($plat);
        $this->load->view('Description_view', $data);
    }

    public function getListeTrier($plat, $deuxplat, $type) {

        $lesCompo = $this->laCompoDesPlats($plat, $deuxplat);

        $data["suggestion"] = $this->PlatCrous->getSuggestion($lesCompo, $type);
        $nbSuggestion = count($data["suggestion"]);

        $lesPlatDejaAjouter = $this->lesPlatsAjouter($data["suggestion"]);

        $lesPlats = $this->PlatCrous->getPlatAvecComposition($lesPlatDejaAjouter, $type);

        $data["suggestion"] = $this->reunirTousLesPlats($nbSuggestion, $data, $lesPlats);

        $this->load->view('Suggestion_view', $data);
    }

    private function laCompoDesPlats($plat, $deuxplat) {
        $plat = str_replace("%20", " ", $plat);
        $compo = $this->PlatCrous->getComposition($plat);
        $lesCompo = null;
        $laCleDUneCompo;
        foreach ($compo as $laCleDUneCompo => $uneCompo) {
            $lesCompo[$laCleDUneCompo] = $uneCompo->nomCompo;
        }
        if ($deuxplat != 'null') {
            $deuxplat = str_replace("%20", " ", $deuxplat);
            $compo = $this->PlatCrous->getComposition($deuxplat);
            $nbElement = count($lesCompo);
            foreach ($compo as $laCleD => $uneCompo) {
                $lesCompo[$nbElement + $laCleD] = $uneCompo->nomCompo;
            }
        }
//        var_dump($lesCompo);
        return $lesCompo;
    }

    private function lesPlatsAjouter($data) {
        $lesPlatDejaAjouter = null;
        foreach ($data as $laCle => $unPlat) {
            $lesPlatDejaAjouter[$laCle] = $unPlat->nomPlat;
        }
        return $lesPlatDejaAjouter;
    }

    private function reunirTousLesPlats($nbSuggestion, $data, $lesPlats) {
        foreach ($lesPlats as $unPlat) {
            $data["suggestion"][$nbSuggestion] = $unPlat;
            $nbSuggestion++;
        };
        return $data["suggestion"];
    }

}
