<?php

class Users_model extends CI_model{ 

    public function index(){

      return $this->db->get('tb_users')->result_array();
    }

    public function store($user){
      
      $this->db->insert('tb_users', $user);
    }

    public function show($id){
      return $this->db->get_where('tb_users', array(
        'id_user'=> $id
      ))->row_array();

    }
    // Função para verificar se já e-mail cadastrado.
    public function email_cadastrado($email){
      return $this->db->get_where('tb_users', array(
        'email'=> $email
      ))->row_array();

    }

    public function update($id, $user){

      $this->db->where('id_user', $id);
      return $this->db->update('tb_users', $user);
    }

    public function apagar($id){

      $this->db->where('id_user', $id);
      return $this->db->delete('tb_users');
    }

    public function count_users() {
      return $this->db->count_all('tb_users');
  }

  public function update_foto($path_file, $id_user){
    $sql = "UPDATE tb_users set foto_usuario = ? WHERE id_user = ?";
    $dados = array($path_file, $id_user);
    $this->db->query($sql, $dados);
  }

}

