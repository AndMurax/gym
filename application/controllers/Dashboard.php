<?php 

defined('BASEPATH') OR exit ('No direct script access allowed');


class Dashboard extends CI_Controller{

    public function __construct(){
		parent::__construct();
        $this->load->model("membro_model");
        $this->load->model("users_model");
        $this->load->model("planosTreino_model");
        $this->load->library('session');
    
	}
    public function index(){
        permission();

        $data["membros"] = $this->membro_model->index();
        $data['usuarios'] = $this->users_model->index();
        $data['valor_mensal'] = $this->planosTreino_model->total_planos();
        $total = $data['total_membros'] = $this->membro_model->get_total_membros();
        $data["title"] = "Dashboard - GYM";
        $data["user"] = $this->session->has_userdata('Logged_user');

        // var_dump($total);
        // exit;
    

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        // $this->load->view('includes/navTop', $data);
        $this->load->view('pages/dashboard', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }


    public function pesquisar(){
        permission();
        $this->load->model("busca_model");
        $data["title"] = "Resultado da pesquisa por *".$_POST['busca']."*";
		$data["result"] = $this->busca_model->search($_POST);
        $this->load->model("membro_model");
    

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/result', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }
}
