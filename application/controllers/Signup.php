<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
 
	public function index(){
		
		$data["title"] = "Sign-up - GYM";
		$this->load->view('pages/signup', $data);

	}

	public function store(){

		
		$this->load->model('users_model');
		$user = array(
			'nome' => $_POST["nome"],
			'email' => $_POST["email"],
			'password' => md5($_POST["password"])
		);
		if ($this->users_model->email_cadastrado($_POST['email'])){
			
			redirect('signup'); 
			set_flashdata("danger", "Email já cadastrado!");
			
		}else{
			$this->users_model->store($user);
			redirect('login');}	
	}
}

	
