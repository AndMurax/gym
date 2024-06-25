<?php 
class Categoria extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('categoria_model');
    }
    public function index() {
        permission();
        
        $data["title"] = "Categoria";
        $data['categorias'] = $this->categoria_model->index();

       
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/categoria', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);
    }


       public function new(){
        permission();
    
        $data["title"] = "Cadastro Categoria - GYM";
        
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-categoria', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }
    
    public function store(){
        permission();

        $categoria  = array(
            "nome" => $_POST['nome'],
            "created_at" => date("Y-m-d H:i:s")   
        );

        //print_r($categoria);
        $this->categoria_model->store($categoria);

        redirect("categoria");
    }
    
    public function edit($id){
        permission();
     
        $data["title"] = "Editar Categoria - GYM";
        $data["categoria"] = $this->categoria_model->show($id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-categoria', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }

    public function update($id){
        permission();

        $categoria  = array(
            "nome" => $_POST['nome'],
            "updated_at" => date("Y-m-d H:i:s")   
        );
        $this->categoria_model->update($id ,$categoria);

        redirect("categoria");
    }

    
    public function delete($id){
        permission();

        $categoria = array(
            "deleted_at" => date("Y-m-d")   
        );
        $this->categoria_model->delete($id, $categoria);

        redirect("categoria");
    }
    
    
}
?>