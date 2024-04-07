<?php

class atividade_model extends CI_model{ 

    
    public function index(){

      $query = $this->db->query("SELECT * FROM atividade WHERE deleted_at is null;");

      return $query->result_array();
      #return $this->db->get('atividade')->result_array();
      
    }

    public function store($atividade){
      
      $this->db->insert('atividade', $atividade);
    }

    public function show($id){


      //$query = $this->db->query("SELECT * from atividade;");
     return $this->db->get_where('atividade', array('atividadeID'=> $id))->row_array();
      //return $query->row_array();

    }

    public function update($id, $atividade){

      $this->db->where('atividadeID', $id);
      return $this->db->update('atividade', $atividade);
    }

    public function delete($id, $atividade){

      //$this->db->query("UPDATE atividade SET deleted_at = $data WHERE AtividadeID = $id");
      $this->db->where('atividadeID', $id);
      return $this->db->update('atividade', $atividade);
    }

}

