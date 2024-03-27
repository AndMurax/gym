<?php 
class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('users_model');
        $id_user = $_SESSION['Logged_user']['id_user'];
        $this->load->helper(array('form', 'url'));
    
       
    }
    public function index() {
        permission();
        //$data['total_users'] = $this->users_model->count_users();
        
        $data["title"] = "Usuarios";
        $data['usuarios'] = $this->users_model->index();

       
        $this->load->view('includes/header', $data);
        $this->load->view('includes/navbar', $data);
        $this->load->view('pages/users', $data);
        $this->load->view('includes/footer', $data);
        $this->load->view('includes/scripts', $data);
    }

    public function upload_foto($id_user){
        $config['upload_path']          = 'application/assets/foto_usuario/';
        $config['allowed_types']        = 'gif|jpg|png';
    

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        

        //verificar se arquivo foi anenexado corretamente.

        if(! $this->upload->do_upload("foto_usuario")){
            $file = $this->upload->data();
            //$error = $this->upload->display_erros('<p>', '</p>');
          var_dump($file);
        }else {

            $file = $this->upload->data(); // Pegando o nome do arquivo anexado
            $path_file = $config["upload_path"].$file["file_name"]; // Concatenando o caminho do arquivo e o nome do arquivo
            $msg = "Upload Feito com sucesso!";
            $this->session->set_flashdata('msg',$msg);
            $this->users_model->update_foto($path_file, $id_user); // Função para atualizar a informação no banco.
        }
        redirect('users');
    }
    
    public function store(){
        permission();

        $users = $_POST;
        $this->users_model->store($users);

        redirect("users");
    }
    
    public function edit($id_user){
        permission();
     
        $data["title"] = "Editar Usuário - GYM";
        
        if ($id_user) {
            $data["users"] = $this->users_model->show($id_user);
            $this->load->view('includes/header', $data);
            $this->load->view('includes/navbar', $data);
            $this->load->view('pages/profile_user', $data);
            $this->load->view('includes/footer', $data);
            $this->load->view('includes/scripts', $data);
        }else{

            echo "Usuário não existe";
        }
       
    }

    public function alterar_foto($id_user){
        permission();
     
        $data["title"] = "Editar Usuário - GYM";
        
        if ($id_user) {
            $data["users"] = $this->users_model->show($id_user);
            $this->load->view('includes/header', $data);
            $this->load->view('includes/navbar', $data);
            $this->load->view('pages/profile_user_foto', $data);
            $this->load->view('includes/footer', $data);
            $this->load->view('includes/scripts', $data);
        }else{

            echo "Usuário não existe";
        }
       
    }

    public function update($id_user){
        permission();
        // $config["upload_path"] = "application/assets/foto_usuario";
        // $config["allowed_types"] = "gif|jpg|jpeg|png";

        // $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        // //verificar se arquivo foi anenexado corretamente.

        // if(! $this->upload->do_upload('foto_usuario')){
        //     //$error = $this->upload->display_erros();
        //     $this->load->view('pages/users');
        // }else {

        //     $file = $this->upload->data();
        //     $path_file = $config["upload_path"].$file["file_name"];
        //     $msg = "upload Feito com sucesso!";
        //     $this->session->set_flashdata('msg',$msg);
        //     $this->users_model->update_foto($path_file, $id_user);
        //     $user = array($nome = $_POST['nome'],
        //                     $email = $_POST['email'],
        //                     $foto_usuario = $path_file);
                            
        //     var_dump($user);
        //     exit;
            
        // }
        $user = $_POST;
        $this->users_model->update($id_user ,$user);
        redirect("users");
    }

    
    public function delete($id_user){
        permission();

        $users = $_POST;
        $this->users_model->delete($id_user);

        redirect("users");
    }
}
?>