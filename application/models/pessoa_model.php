<?php

class pessoa_model extends CI_model{ 

    public function index(){

      $query = $this->db->query("SELECT * FROM pessoa p
       WHERE deleted_at is null;");

      // $query = $this->db->query("SELECT * FROM pessoa m;");
      return $query->result_array();
      #return $this->db->get('pessoa')->result_array();
      
    }

    public function get_list_pessoas(){

      // $query = $this->db->query("SELECT * FROM pessoa m
      // LEFT JOIN associacao_pessoa_plano amp ON amp.pessoa_id = p.pessoa_id;");

        $query = $this->db->query("SELECT p.pessoa_id, 
                                          p.nome, 
                                          tc.nome as tipo_cliente
                                      FROM pessoa p
                                        INNER JOIN tipo_cliente tc 
                                          on p.tipo_cliente_id = tc.tipo_cliente_id
                                      WHERE deleted_at IS NULL;");
      return $query->result_array();
      #return $this->db->get('pessoa')->result_array();
      
    }

    public function store($pessoa){
      
      $this->db->insert('pessoa', $pessoa);
    }

    public function show($id){

      //$query = $this->db->query("SELECT * from pessoa;");
      return $this->db->get_where('pessoa', array('pessoa_id'=> $id))->row_array();
      //  return $query->row_array();

    }

    public function get_total_pessoas(){

      $query = $this->db->query("SELECT count(p.pessoa_id) as total FROM pessoa p where ativo = 1 and p.deleted_at is  null;");
   
      return $query->row_array();

    }

    public function update($id, $pessoa){

      $this->db->where('pessoa_id', $id);
      return $this->db->update('pessoa', $pessoa);
    }

    public function delete($id, $pessoa){

      // return $this->db->query("UPDATE pessoa SET deleted_at = $pessoa WHERE pessoa_id = $id");
      $this->db->where('pessoa_id', $id);
      return $this->db->update('pessoa', $pessoa);
    }

    public function verificar_cpf_cadastrado($cpf){


      return $this->db->get_where('pessoa', array('CPF'=> $cpf))->row();
      
    }

}

