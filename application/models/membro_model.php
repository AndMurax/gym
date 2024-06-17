<?php

class membro_model extends CI_model{ 

    public function index(){

      $query = $this->db->query("SELECT * FROM membro m
      LEFT JOIN associacao_membro_plano amp ON amp.MembroID = m.MembroID WHERE deleted_at is null;");

      // $query = $this->db->query("SELECT * FROM membro m;");
      return $query->result_array();
      #return $this->db->get('membro')->result_array();
      
    }

    public function get_list_membros(){

      // $query = $this->db->query("SELECT * FROM membro m
      // LEFT JOIN associacao_membro_plano amp ON amp.MembroID = m.MembroID;");

        $query = $this->db->query("SELECT m.MembroID, m.Nome, amp.DataTermino FROM membro m
        LEFT JOIN associacao_membro_plano amp ON amp.MembroID = m.MembroID WHERE deleted_at is null;");
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

      $query = $this->db->query("SELECT count(m.MembroID) as total FROM membro m where ativo = 1 and m.deleted_at is  null;");
   
      return $query->row_array();

    }

    public function update($id, $membro){

      $this->db->where('MembroID', $id);
      return $this->db->update('membro', $membro);
    }

    public function delete($id, $membro){

      // return $this->db->query("UPDATE membro SET deleted_at = $membro WHERE MembroID = $id");
      $this->db->where('MembroID', $id);
      return $this->db->update('membro', $membro);
    }

    public function verificar_cpf_cadastrado($cpf){


      return $this->db->get_where('membro', array('CPF'=> $cpf))->row();
      
    }

}

