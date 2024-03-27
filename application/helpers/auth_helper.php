<?php   


function permission(){

    $ci = get_instance();
    $loggedUser = $ci->session->userdata("Logged_user");
    if(!$loggedUser) {
        $ci->session->set_flashdata("danger", "Você precisa está logado para acessar esta página");
        redirect('login');
    }
    return $loggedUser;
}

?>