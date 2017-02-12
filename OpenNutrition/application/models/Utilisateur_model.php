<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilisateur_model
 *
 * @author Abdel
 */
class Utilisateur_model extends CI_Model {

    private $tableUser = 'utilisateur';

    public function seConnecter($identifiant, $mdp, $typeConnexion) {
        $this->query = $this->db->select()
                ->from($this->tableUser)
                ->where(array('nomUser' => $identifiant, 'mdpUser' => $mdp, 'roleUser' => $typeConnexion))
                ->get();
        return $this->query->num_rows();
    }

    public function getUtilisateur() {
        return $this->db->select('nomUser')
                        ->from($this->tableUser)
                        ->order_by('nomUser')
                        ->get()
                        ->result();
    }

    public function insererUtilisateur($nom,$type, $mdp) {
        $this->db->set('nomUser', $nom);
        $this->db->set('mdpUser', $mdp);
        $this->db->set('roleUser', $type);
        $this->db->insert($this->tableUser);
    }
    public function supprimerUtilisateur($nom) {
        $this->db->where('nomUser', $nom);
        $this->db->delete($this->tableUser);
    }

}
