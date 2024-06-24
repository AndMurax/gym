<?php 
class planosTreino extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('planostreino_model');
    }
    public function index() {
        permission();
        
        $data["title"] = "planos Treino";
        $data['planostreinos'] = $this->planostreino_model->index();

       
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/planostreino', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);
    }


       public function new(){
        permission();
    
        $data["title"] = "Cadastro planostreino - GYM";
        
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-planostreino', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }
    
    public function store(){
        permission();

        $planostreino = $_POST;
        $this->planostreino_model->store($planostreino);

        redirect("planostreino");
    }
    
    public function edit($id){
        permission();
     
        $data["title"] = "Editar planostreino - GYM";
        $debugar = $data["planostreino"] = $this->planostreino_model->show($id);
        


        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-planostreino', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }

    public function update($id){
        permission();

        $planostreino = $_POST;
        $this->planostreino_model->update($id ,$planostreino);

        redirect("planostreino");
    }

    
    public function delete($id){
        permission();

        $planostreino = $_POST;
        $this->planostreino_model->delete($id);

        redirect("planostreino");
    }
    
    
}
?>