<?php 

defined('BASEPATH') OR exit ('No direct script access allowed');


class Pessoa extends CI_Controller{
    public function __construct(){
		parent::__construct();
        $this->load->model("pessoa_model");
        $this->load->model("tipo_cliente_model");
	}

    public function index(){
        permission();
        
        $pessoas = $data["pessoas"] = $this->pessoa_model->get_list_pessoas();

        // var_dump($pessoas);
        // die;
        $data["title"] = "pessoa - GYM";

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/pessoa', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);
    }

    public function new(){
        permission();
    
        $data['tipo_clientes'] = $this->tipo_cliente_model->index();
        $data["title"] = "Cadastro pessoa - GYM";
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-pessoa', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }

    public function store(){
       
        permission();

        $pessoa = array(
            'Nome' => $_POST['nome'],
            'obs' => $_POST['obs'],
            'email' => $_POST['email'],
            'Telefone' => $_POST['Telefone'],
            'tipo_cliente_id' => $_POST['tipo_cliente_id'],
            'created_at' => date("Y-m-d H:i:s"));
        
        // var_dump($pessoa);
        // die;
        $this->pessoa_model->store($pessoa);
        
            
        redirect("pessoa");
    }

    public function uploud_foto(){
        $config['uploud_path'] = "assets/foto_pessoa/";
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

        $data['tipo_clientes'] = $this->tipo_cliente_model->index();
        $data["title"] = "Editar Pessoa - GYM";
        $data["pessoa"] = $this->pessoa_model->show($id);

        // echo '<pre>';
        // print_r($pessoa);
        // echo '<pre>';
        // die();

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-pessoa', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }


    public function update($id){
        permission();

        $pessoa = array(
            'Nome' => $_POST['nome'],
            'obs' => $_POST['obs'],
            'Email' => $_POST['email'],
            'Telefone' => $_POST['Telefone'],
            'tipo_cliente' => $_POST['tipo_cliente_id'],
            'created_at' => date("Y-m-d H:i:s"));
        
        // echo '<pre>';
        // print_r($pessoa);
        // echo '<pre>';
        // die();

        $this->pessoa_model->update($id ,$pessoa);
        redirect("pessoa");
    }

    
    public function delete($id){
        permission();

        $pessoa = array( 'pessoa_id' => $id,
            "deleted_at" => date("Y-m-d")   
        );

        
        // echo '<pre>';
        // print_r($pessoa);
        // echo '<pre>';
        // die();

        $this->pessoa_model->delete($id, $pessoa);

        redirect("pessoa");
    }


}
