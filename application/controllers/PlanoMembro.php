<?php 
class PlanoMembro extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('plano_membro_model');
    }
    public function index() {
        permission();
        
        $data["title"] = "Plano Membro";
        $data['PlanoMembro'] = $this->plano_membro_model->index();

       
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/PlanoMembro', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);
    }


       public function new(){
        permission();
    
        $data["title"] = "Cadastro Plano Membro - GYM";
        
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-PlanoMembro', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }
    
    public function store(){
        permission();

        $PlanoMembro  = array(
            "NomePlanoMembro" => $_POST['NomePlanoMembro'],
            "DescricaoPlanoMembro" => $_POST['DescricaoPlanoMembro'],
            "created_at" => date("Y-m-d H:i:s")   
        );

        //print_r($PlanoMembro);
        $this->plano_membro_model->store($PlanoMembro);

        redirect("PlanoMembro");
    }
    
    public function edit($id){
        permission();
     
        $data["title"] = "Editar Plano Membro - GYM";
        $data["PlanoMembro"] = $this->plano_membro_model->show($id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-PlanoMembro', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }

    public function update($id){
        permission();

        $PlanoMembro  = array(
            "NomePlanoMembro" => $_POST['NomePlanoMembro'],
            "DescricaoPlanoMembro" => $_POST['DescricaoPlanoMembro'],
            "updated_at" => date("Y-m-d H:i:s")   
        );
        $this->plano_membro_model->update($id ,$PlanoMembro);

        redirect("PlanoMembro");
    }

    
    public function delete($id){
        permission();

        $PlanoMembro = array(
            "deleted_at" => date("Y-m-d")   
        );
        $this->plano_membro_model->delete($id, $PlanoMembro);

        redirect("PlanoMembro");
    }
    
    
}
?>