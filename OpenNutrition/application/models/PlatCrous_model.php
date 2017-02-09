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
    private $compose_Allergene = 'composeallergene';
    private $allergene = 'allergenes';
    
    
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
    
    
    public function getPlatAllergene($plat){
        return $this->db->select('*')
                        ->from($this->tablePlatCrous)              
                        ->join($this->compose_Allergene,'platscrous.nomPlat = composeallergene.nomPlat')
                        ->join($this->allergene,'allergenes.nomAllergene = composeallergene.nomAllergene')
                        ->where('platscrous.nomPlat',$plat)
                        ->get()
                        ->result();
        
    }
    public function getPlatNote($plat){
        $notePlat = $this->db->select('note5C')
                        ->from($this->tablePlat)
                        ->where('nomPlat',$plat)
                        ->get()
                        ->result();
        if(!empty($notePlat)){
            return $notePlat[0]->note5C;
            
        }
        return null;
    }
    
}
