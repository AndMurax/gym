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

      $query = $this->db->query("SELECT sum(pt.PrecoPlano) total from membro m inner join planostreino pt on pt.PlanoID = m.planoID;");
      return $query->row_array();

    }

}

