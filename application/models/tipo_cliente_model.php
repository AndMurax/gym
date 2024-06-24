<?php

class tipo_cliente_model extends CI_model{ 

    
    public function index(){

      $query = $this->db->query("SELECT * FROM tipo_cliente;");

      return $query->result_array();
      #return $this->db->get('tipo_cliente')->result_array();
      
    }

    public function store($tipo_cliente){
      
      $this->db->insert('tipo_cliente', $tipo_cliente);
    }

    public function show($id){

      //$query = $this->db->query("SELECT * from tipo_cliente where $id;");
      return $this->db->get_where('tipo_cliente', array('tipo_cliente_id'=> $id))->row_array();
        //return $query->row_array();

    }

    public function update($id, $tipo_cliente){

      $this->db->where('tipo_cliente_id', $id);
      return $this->db->update('tipo_cliente', $tipo_cliente);
    }

    public function delete($id){

      $this->db->where('tipo_cliente_id', $id);
      return $this->db->delete('tipo_cliente');
    }

  

}

