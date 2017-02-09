<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PlatCrous_model
 *
 * @author Abdel
 */
class PlatCrous_model extends CI_Model  {
    private $tablePlatCrous = 'platscrous';
    private $tablePlat = 'plats';
    private $compose_ingredients = 'compose_ingredients';
    private $ingredients = 'ingredients';
    
    
        public function getPlatCrousEntree() {
            
        return $this->db->select('*')
                        ->from($this->tablePlatCrous)
                        ->join($this->tablePlat, "platscrous.nomPlat = plats.nomPlat")
                        ->where('typePlat','Entree')
                        ->order_by('typePlat')
                        ->get()
                        ->result();
    }
    
     public function getPlatCrousPlat() {
            
        return $this->db->select('*')
                        ->from($this->tablePlatCrous)
                        ->join($this->tablePlat, "platscrous.nomPlat = plats.nomPlat")
                        ->where('typePlat','Plat')
                        ->order_by('typePlat')
                        ->get()
                        ->result();
    }
    
     public function getPlatCrousDessert() {
            
        return $this->db->select('*')
                        ->from($this->tablePlatCrous)
                        ->join($this->tablePlat, "platscrous.nomPlat = plats.nomPlat")
                        ->where('typePlat','Dessert')
                        ->order_by('typePlat')
                        ->get()
                        ->result();
    }
    
    
    public function getPlatIngrediant($plat){
        return $this->db->select('*')
                        ->from($this->tablePlatCrous)              
                        ->join($this->compose_ingredients,'platscrous.nomPlat = compose_ingredients.nomPlat')
                        ->join($this->ingredients,'ingredients.nomIngredient = compose_ingredients.nomIngredient')
                        ->where('platscrous.nomPlat',$plat)
                        ->get()
                        ->result();
        
    }
    public function getPlatNote($plat){
        $notePlat = $this->db->select('note')
                        ->from($this->tablePlat)
                        ->where('nomPlat',$plat)
                        ->get()
                        ->result();
        if(!empty($notePlat)){
            return $notePlat[0]->note;
            
        }
        return null;
    }
    
    public function calculNote($densiteEnergetique, $graissesSaturees, $sucreSimples, $sodium, $fruitsLegumesNoix, $fibres, $proteines) {
        $score = calculScroreNote($densiteEnergetique, $graissesSaturees, $sucreSimples, $sodium, $fruitsLegumesNoix, $fibres, $proteines);
        if ($score < -1)
            return "A";
        if ($score < 4)
            return "B";
        if ($score < 12)
            return "C";
        if ($score < 17)
            return "D";
        if ($score >= 17)
            return "E";
    }

    public function calculScroreNote($densiteEnergetique, $graissesSaturees, $sucreSimples, $sodium, $fruitsLegumesNoix, $fibres, $proteines) {
        return calculPointsNegatifs($densiteEnergetique, $graissesSaturees, $sucreSimples, $sodium) - calculPointsPositifs($fruitsLegumesNoix, $fibres, $proteines);
    }

    private function calculPointsNegatifs($densiteEnergetique, $graissesSaturees, $sucreSimples, $sodium) {
        return calculPointsEnergie($densiteEnergetique) + calculPointsGraisse($graissesSaturees) + calculPointsSucre($sucreSimples) + calculPointsSel($sodium);
    }

    private function calculPointsPositifs($fruitsLegumesNoix, $fibres, $proteines) {
        return calculPointsFruitsLegumes($fruitsLegumesNoix) + calculPointsFibres($fibres) + calculPointsProteines($proteines);
    }

    private function calculPointsEnergie($densiteEnergetique) {
        if ($densiteEnergetique > 3350)
            return 10;
        if ($densiteEnergetique > 3015)
            return 9;
        if ($densiteEnergetique > 2680)
            return 8;
        if ($densiteEnergetique > 2345)
            return 7;
        if ($densiteEnergetique > 2010)
            return 6;
        if ($densiteEnergetique > 1675)
            return 5;
        if ($densiteEnergetique > 1340)
            return 4;
        if ($densiteEnergetique > 1005)
            return 3;
        if ($densiteEnergetique > 670)
            return 2;
        if ($densiteEnergetique > 335)
            return 1;
        if ($densiteEnergetique <= 335)
            return 0;
    }

    private function calculPointsGraisse($graissesSaturees) {
        if ($graissesSaturees > 10)
            return 10;
        if ($graissesSaturees > 9)
            return 9;
        if ($graissesSaturees > 8)
            return 8;
        if ($graissesSaturees > 7)
            return 7;
        if ($graissesSaturees > 6)
            return 6;
        if ($graissesSaturees > 5)
            return 5;
        if ($graissesSaturees > 4)
            return 4;
        if ($graissesSaturees > 3)
            return 3;
        if ($graissesSaturees > 2)
            return 2;
        if ($graissesSaturees > 1)
            return 1;
        if ($graissesSaturees <= 1)
            return 0;
    }

    private function calculPointsSucre($sucreSimples) {
        if ($sucreSimples > 45)
            return 10;
        if ($sucreSimples > 40)
            return 9;
        if ($sucreSimples > 36)
            return 8;
        if ($sucreSimples > 31)
            return 7;
        if ($sucreSimples > 27)
            return 6;
        if ($sucreSimples > 22.5)
            return 5;
        if ($sucreSimples > 18)
            return 4;
        if ($sucreSimples > 13.5)
            return 3;
        if ($sucreSimples > 9)
            return 2;
        if ($sucreSimples > 4.5)
            return 1;
        if ($sucreSimples <= 4.5)
            return 0;
    }

    private function calculPointsSel($sodium) {
        if ($sodium > 900)
            return 10;
        if ($sodium > 810)
            return 9;
        if ($sodium > 720)
            return 8;
        if ($sodium > 630)
            return 7;
        if ($sodium > 540)
            return 6;
        if ($sodium > 450)
            return 5;
        if ($sodium > 360)
            return 4;
        if ($sodium > 270)
            return 3;
        if ($sodium > 180)
            return 2;
        if ($sodium > 90)
            return 1;
        if ($sodium <= 90)
            return 0;
    }

    private function calculPointsFruitsLegumes($fruitsLegumesNoix) {
        if ($fruitsLegumesNoix > 80)
            return 5;
        if ($fruitsLegumesNoix > 670)
            return 2;
        if ($fruitsLegumesNoix > 335)
            return 1;
        if ($fruitsLegumesNoix <= 335)
            return 0;
    }

    private function calculPointsFibres($fibres) {
        if ($fibres > 4.7)
            return 5;
        if ($fibres > 3.7)
            return 4;
        if ($fibres > 2.8)
            return 3;
        if ($fibres > 1.9)
            return 2;
        if ($fibres > 0.9)
            return 1;
        if ($fibres <= 0.9)
            return 0;
    }

    private function calculPointsProteines($proteines) {
        if ($proteines > 8.0)
            return 5;
        if ($proteines > 6.4)
            return 4;
        if ($proteines > 4.8)
            return 3;
        if ($proteines > 3.2)
            return 2;
        if ($proteines > 1.6)
            return 1;
        if ($proteines <= 1.6)
            return 0;
    }
}
