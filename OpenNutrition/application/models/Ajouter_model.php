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
    
    function db_insert($data){
        $this->db->insert('platscrous', $data);
    }
    
}
