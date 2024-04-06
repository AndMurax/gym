<?php

class planosTreino_model extends CI_model{ 

    
    public function index(){

      $query = $this->db->query(" SELECT * FROM planostreino;");

      return $query->result_array();
      #return $this->db->get('planostreino')->result_array();
      
    }

    public function store($planostreino){
      
      $this->db->insert('planostreino', $planostreino);
    }

    public function show($id){

      //$query = $this->db->query("SELECT * from planostreino where $id;");
      return $this->db->get_where('planostreino', array('planoID'=> $id))->row_array();
        //return $query->row_array();

    }

    public function update($id, $planostreino){

      $this->db->where('planoID', $id);
      return $this->db->update('planostreino', $planostreino);
    }

    public function delete($id){

      $this->db->where('planoID', $id);
      return $this->db->delete('planostreino');
    }


    public function total_planos(){

      $query = $this->db->query("SELECT sum(pt.PrecoPlano) total from membro m inner join planostreino pt on pt.PlanoID = m.planoID where m.ativo = 1;");
      return $query->row_array();

    }

    public function get_valor_mensal_total(){

      $query = $this->db->query("SELECT sum(pt.PrecoPlano)  as total FROM membro m
      INNER JOIN planostreino pt on pt.PlanoID = m.PlanoID
      INNER JOIN associacao_membro_plano amp ON amp.MembroID = m.MembroID 
      INNER JOIN (SELECT MembroID,dateDIFF(CURRENT_DATE() , amp.DataTermino ) as dias_restante 
      from associacao_membro_plano amp 
      where dateDIFF(amp.DataTermino, current_date) between 0 and 30) dias on dias.MembroID = m.MembroID
      WHERE m.Ativo = 1 ;");

      return $query->row_array();

    }


    public function get_valor_anual_total(){

      $query = $this->db->query("SELECT sum(pt.PrecoPlano) as total FROM membro m
      INNER JOIN planostreino pt on pt.PlanoID = m.PlanoID
      INNER JOIN associacao_membro_plano amp ON amp.MembroID = m.MembroID 
      INNER JOIN (SELECT MembroID, year(amp.DataTermino) as ano
      from associacao_membro_plano amp where year(amp.DataTermino) = year(now())) dias on dias.MembroID = m.MembroID
      WHERE m.Ativo = 1 ;");

      return $query->row_array();

    }

}

