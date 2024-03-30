<?php 
class Atividade extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('atividade_model');
    }
    public function index() {
        permission();
        
        $data["title"] = "Atividade";
        $data['atividadees'] = $this->atividade_model->index();

       
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/atividade', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);
    }


       public function new(){
        permission();
    
        $data["title"] = "Cadastro Atividade - GYM";
        
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-atividade', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }
    
    public function store(){
        permission();

        $atividade  = array(
            "NomeAtividade" => $_POST['NomeAtividade'],
            "DescricaoAtividade" => $_POST['DescricaoAtividade'],
            "created_at" => date("Y-m-d H:i:s")   
        );

        print_r($atividade);
        $this->atividade_model->store($atividade);

        redirect("atividade");
    }
    
    public function edit($id){
        permission();
     
        $data["title"] = "Editar Atividade - GYM";
        $data["atividade"] = $this->atividade_model->show($id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-atividade', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }

    public function update($id){
        permission();

        $atividade  = array(
            "NomeAtividade" => $_POST['NomeAtividade'],
            "DescricaoAtividade" => $_POST['DescricaoAtividade'],
            "updated_at" => date("Y-m-d H:i:s")   
        );
        $this->atividade_model->update($id ,$atividade);

        redirect("atividade");
    }

    
    public function delete($id){
        permission();

        $atividade = array(
            "deleted_at" => date("Y-m-d")   
        );
        $this->atividade_model->delete($id, $atividade);

        redirect("atividade");
    }
    
    
}
?>