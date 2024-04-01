<?php 
class Instrutor extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('instrutor_model');
    }
    public function index() {
        permission();
        
        $data["title"] = "Instrutor";
        $data['instrutores'] = $this->instrutor_model->index();

       
		$this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/instrutor', $data);
        $this->load->view('includes/scripts', $data);
        $this->load->view('includes/footer', $data);
    }

       public function new(){
        permission();
    
        $data["title"] = "Cadastro Instrutor - GYM";
        
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-instrutor', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }
    
    public function store(){
        permission();

        $instrutor = $_POST;
        $this->instrutor_model->store($instrutor);

        redirect("instrutor");
    }
    
    public function edit($id){
        permission();
     
        $data["title"] = "Editar instrutor - GYM";
        $data["instrutor"] = $this->instrutor_model->show($id);

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-instrutor', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }

    public function update($id){
        permission();

        $instrutor = $_POST;
        $this->instrutor_model->update($id ,$instrutor);

        redirect("instrutor");
    }

    
    public function delete($id){
        permission();

        $instrutor = $_POST;
        $this->instrutor_model->delete($id);

        redirect("instrutor");
    }
    
    
}
?>