<?php

class categoria_model extends CI_model{ 

    
    public function index(){

      $query = $this->db->query("SELECT * FROM categoria WHERE deleted_at is null;");

      return $query->result_array();
      #return $this->db->get('categoria')->result_array();
      
    }

    public function store($categoria){
      
      $this->db->insert('categoria', $categoria);
    }

    public function show($id){


      //$query = $this->db->query("SELECT * from categoria;");
     return $this->db->get_where('categoria', array('categoria_id'=> $id))->row_array();
      //return $query->row_array();

    }

    public function update($id, $categoria){

      $this->db->where('categoria_id', $id);
      return $this->db->update('categoria', $categoria);
    }

    public function delete($id, $categoria){

      //$this->db->query("UPDATE categoria SET deleted_at = $data WHERE categoriaID = $id");
      $this->db->where('categoria_id', $id);
      return $this->db->update('categoria', $categoria);
    }

}

