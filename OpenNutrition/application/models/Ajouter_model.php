<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @author Yohan
 */
class Ajouter_model extends CI_Model  {


    function __construct() {
        parent::__construct();
    }
    
    /**
    *@param : $data un tableau comprenant :
    * - le nom du plat
    * - le prix du plat
    * - le type du plat
    * - la note 5C
    * - la note CO2
    */
    function db_insertPlat($data){
        $this->db->insert('platscrous', $data);
    }

    /**
    *@param : $data un tableau comprenant le nom du plat à ajouter et le nom de la composition associée
    */
    function db_insertCompoPlat($data){
        $this->db->insert('compositionplat', $data);
    }
    
}
