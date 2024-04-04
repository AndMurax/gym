<?php

class membro_model extends CI_model{ 

    public function index(){

      $query = $this->db->query("SELECT * FROM membro m
      LEFT JOIN associacao_membro_plano amp ON amp.MembroID = m.MembroID;");

      // $query = $this->db->query("SELECT * FROM membro m;");
      return $query->result_array();
      #return $this->db->get('membro')->result_array();
      
    }


    public function get_list_membros(){

      // $query = $this->db->query("SELECT * FROM membro m
      // LEFT JOIN associacao_membro_plano amp ON amp.MembroID = m.MembroID;");

        $query = $this->db->query("SELECT m.MembroID, m.Nome, amp.DataTermino FROM membro m
        LEFT JOIN associacao_membro_plano amp ON amp.MembroID = m.MembroID ;");
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

    public function set_membro_plano(array $planoMembro){

      // $query = $this->db->query("INSERT INTO `associacao_membro_plano` (`MembroID`, `PlanoID`, `DataInicio`, `DataTermino`) VALUES ("$planoMembro['MembroID']", '3', '2024-04-01', '2024-04-30')");
      return $this->db->insert('associacao_membro_plano', $planoMembro);

    }


    public function show_membro_plano($id){

      //$query = $this->db->query("SELECT * from Membro;");
      return $this->db->get_where('associacao_membro_plano', array('MembroID'=> $id))->row_array();
      //  return $query->row_array();

    }



    public function update_membro_plano($id, $planoMembro){

      $this->db->where('MembroID', $id);
      return $this->db->update('associacao_membro_plano', $planoMembro);
    }

}

