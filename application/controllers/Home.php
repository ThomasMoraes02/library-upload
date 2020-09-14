<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function index()
	{
		$this->load->model("teste_model");
		$arquivos = $this->teste_model->recuperaArquivos();

		$data['arquivos'] = $arquivos;
		$data['titulo'] = "Home | Codeigniter 3";
		$this->load->view('Home',$data);
	}

	public function Cadastrar()
	{
		$nomeArquivo = array("nome" => $this->input->post("nome"));  

		$this->load->model("teste_model");
		$this->teste_model->cadastraArquivo($nomeArquivo);

		//$path = "../arquivos";

		$config['upload_path'] = FCPATH . "arquivos";
		$config['allowed_types'] = "doc|pdf|docx|zip|rar";

		//if(!is_dir($path)) mkdir($path); 
			
		$this->load->library("upload", $config);

		if($this->upload->do_upload('arquivo')) { 
			//$infoArquivo = $this->upload->data();
			//var_dump($infoArquivo);
			$this->session->set_flashdata("sucesso", "Arquivo cadastrado com sucesso");
		} else {
			$this->session->set_flashdata("falha", "Arquivo não cadastrado");
		}
		redirect("/");
	}
}
