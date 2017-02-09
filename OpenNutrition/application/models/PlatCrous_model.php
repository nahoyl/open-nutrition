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

    public function getPlatCrous() {
            
        return $this->db->select('*')
                        ->from($this->tablePlatCrous)
                        ->join($this->tablePlat, "platscrous.nomPlat = plats.nomPlat")
                        ->order_by('platscrous.nomPlat')
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
    
}
