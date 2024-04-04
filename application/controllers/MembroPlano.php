<?php 
class MembroPlano extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('membro_plano_model');
        $this->load->model('membro_model');
        $this->load->model('planosTreino_model');
    }
    // public function index() {
    //     permission();
        
    //     $data["title"] = "Plano Membro";
    //     $data['PlanoMembro'] = $this->membro_plano_model->index();
    //     $membro = $data["membro"] = $this->membro_model->show($id);

       
    //     $this->load->view('includes/header', $data);
    //     $this->load->view('includes/navbar', $data);
    //     $this->load->view('pages/PlanoMembro', $data);
    //     $this->load->view('includes/footer', $data);
    //     $this->load->view('includes/scripts', $data);
    // }


       public function new(){
        permission();
    
        $data["title"] = "Cadastro Plano Membro - GYM";
        
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-membroPlano', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }
    
    public function store($id){
        permission();

        $dataInicio = new DateTime($_POST['DataInicio']);
        $membroPlano = array('MembroID' => $id,
                        'PlanoID' => $_POST['PlanoID'],
                        'DataInicio'=> $dataInicio->format('y-m-d'),
                        'DataTermino' => $dataInicio->modify('+30 days')->format('y-m-d'));

        // var_dump($membroPlano);
        // die;
    
       $this->membro_plano_model->store($membroPlano);

        redirect("membro");
    }
    
    public function edit($id){
        permission();
     
        $data["title"] = "Editar Plano Membro - GYM";
        $data["membroPlano"] = $this->membro_plano_model->show($id);
        $membro = $data["membro"] = $this->membro_model->show($id);
        $data['planostreinos'] = $this->planosTreino_model->index();

        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/form-membroPlano', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);

    }

    public function update($id){
        permission();
        $dataInicio = new DateTime($_POST['DataInicio']);
        $membroPlano = array('MembroID' => $id,
                        'PlanoID' => $_POST['PlanoID'],
                        'DataInicio'=> $dataInicio->format('y-m-d'),
                        'DataTermino' => $dataInicio->modify('+30 days')->format('y-m-d'));

        // var_dump($membroPlano);
        // die;
    
       $this->membro_plano_model->update($id, $membroPlano);

        redirect("membro");
    }

    
    public function delete($id){
        permission();

        $membroPlano = array(
            "deleted_at" => date("Y-m-d")   
        );
        $this->membro_plano_model->delete($id, $membroPlano);

        redirect("membro");
    }
    
    
}
?>