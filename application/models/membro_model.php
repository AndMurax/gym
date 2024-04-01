<?php

class membro_model extends CI_model{ 

    
    public function index(){

      $query = $this->db->query(" SELECT * FROM Membro;");

      return $query->result_array();
      #return $this->db->get('membro')->result_array();
      
    }

    public function store($membro){
      
      $this->db->insert('membro', $membro);
    }

    public function show($id){

      //$query = $this->db->query("SELECT * from Membro;");
      return $this->db->get_where('membro', array('MembroID'=> $id))->row_array();
      //  return $query->row_array();

    }


    
    public function get_total_membros(){

      $query = $this->db->query("SELECT count(m.MembroID) as total FROM membro m where ativo = 1;");
   
        return $query->row_array();

    }

    public function update($id, $membro){

      $this->db->where('MembroID', $id);
      return $this->db->update('membro', $membro);
    }

    public function delete($id){

      $this->db->where('MembroID', $id);
      return $this->db->delete('membro');
    }


    public function verificar_cpf_cadastrado($cpf){

      //$query = $this->db->query("SELECT MembroID FROM `membro` WHERE CPF =;");
      return $this->db->get_where('membro', array('CPF'=> $cpf))->row_array();
      //return $query->row_array();

    }

}

