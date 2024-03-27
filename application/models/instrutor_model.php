<?php

class instrutor_model extends CI_model{ 

    
    public function index(){

      $query = $this->db->query(" SELECT * FROM instrutor;");

      return $query->result_array();
      #return $this->db->get('instrutor')->result_array();
      
    }

    public function store($instrutor){
      
      $this->db->insert('instrutor', $instrutor);
    }

    public function show($id){
    //$query = $this->db->query("SELECT * from instrutor;");
     return $this->db->get_where('instrutor', array('instrutorID'=> $id))->row_array();
    //return $query->row_array();
    }

    public function update($id, $instrutor){

      $this->db->where('instrutorID', $id);
      return $this->db->update('instrutor', $instrutor);
    }

    public function delete($id){

      $this->db->where('instrutorID', $id);
      return $this->db->delete('instrutor');
    }

}

