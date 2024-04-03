<?php 

defined('BASEPATH') OR exit ('No direct script access allowed');


class Membro extends CI_Controller{
    public function __construct(){
		parent::__construct();
        $this->load->model("membro_model");
        $this->load->model("planosTreino_model");
	}

    public function index(){
        permission();
    
        $data["membros"] = $this->membro_model->index();
        $data['planostreinos'] = $this->planosTreino_model->index();
        $data["title"] = "Membro - GYM";

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/membro', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);
    }


    public function new(){
        permission();
    
        $data["title"] = "Cadastro membro - GYM";
        $data['planostreinos'] = $this->planosTreino_model->index();

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-membro', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }

    public function store(){
        permission();

        $membro = $_POST;
        $this->membro_model->store($membro);

        redirect("membro");
    }

    public function uploud_foto(){
        $config['uploud_path'] = "assets/foto_membro/";
        $config["max_size"] = 2048;
        $config["allowed_types"] = "gif|jpg|jpeg|png";

        $this->load-libratry('uploud',$config);

        //verificar se arquivo foi anenexado corretamente.

        if(!$this->uploud->do_uploud('foto_usuario')){
            $msg = $this->uploud->display_erros();
            $this->session->set_flashdata('msg',$msg);
        }else {
            $msg = "Uploud Feito com sucesso!";
            $this->session-set_flashdata('msg',$msg);
        }
        redirect('usurio');
    }
    
    public function edit($id){
        permission();
     
        $data["title"] = "Editar membro - GYM";
        $membro = $data["membro"] = $this->membro_model->show($id);
        $data['planostreinos'] = $this->planosTreino_model->index();

        // echo '<pre>';
        // print_r($membro);
        // echo '<pre>';
        // die();

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-membro', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }


    public function membroPlano($id){
        permission();
     
        $data["title"] = "Editar membro - GYM";
        $membro = $data["membro"] = $this->membro_model->show($id);
        $data['planostreinos'] = $this->planosTreino_model->index();
        $data['membroPlano'] = $this->membro_model->show_membro_plano($id);

        // echo '<pre>';
        // print_r($membro);
        // echo '<pre>';
        // die();

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-membroPlano', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }


    public function update($id){
        permission();

        if(isset($_POST['DataInicio'])){
            $dataInicio = new DateTime($_POST['DataInicio']);
            $membroPlano = array('MembroID' => $id,
                            'PlanoID' => $_POST['PlanoID'],
                            'DataInicio'=> $dataInicio->format('y-m-d'),
                            'DataTermino' => $dataInicio->modify('+30 days')->format('y-m-d'));

            // var_dump($membroPlano);
            // die;
        
           $this->membro_model->set_membro_plano($membroPlano);

        }else {
            $membro = $_POST;
            $this->membro_model->update($id ,$membro);
        }
        
        redirect("membro");
    }

    
    public function delete($id){
        permission();

        $membro = $_POST;
        $this->membro_model->delete($id);

        redirect("membro");
    }
    
    
}
