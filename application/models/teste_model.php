<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Teste_model extends CI_Model
{
    public function cadastraArquivo($nomeArquivo)
    {
        $this->load->database();
        $this->db->insert("tb_arquivos", $nomeArquivo);
    }

    public function recuperaArquivos()
    {
        $this->load->database();
        return $this->db->get("tb_arquivos")->result_array();
    }
}

?>