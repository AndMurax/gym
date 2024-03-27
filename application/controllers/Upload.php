<?php 
class Upload extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library('upload');
	}

	public function index()
	{
			$this->load->view('pages/upload_form', array('error' => ' ' ));
	}

	public function do_upload()
	{
			$config['upload_path']          = 'application/assets/foto_usuario/';
			$config['allowed_types']        = 'gif|jpg|png';
		

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('userfile'))
			{
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('pages/upload_form', $error);
			}
			else
			{
					$data = array('upload_data' => $this->upload->data());
					var_dump($data);
					exit;
					$this->load->view('pages/upload_success', $data);
			}
	}
}
?>

