<?php

class Busca_model extends CI_model{ 

// função utilizada para buscar um informação específica no banco
    public function search($busca){

        if(empty($busca)){
            return array();
        }
        $busca = $this->input->post('busca');
        return $this->db->query("SELECT * FROM Membro
        where nome like '%$busca%';
        ")->result_array();
    }
    
    public function qtd_total($busca){
        $query = $this->db->query("SELECT count(MembroID) AS num_of_time FROM Membro where nome = $busca ");
        // print_r($query->result());
        return $query->result_array();
        
    }
}

?>