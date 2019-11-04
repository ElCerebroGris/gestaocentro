<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TipoQuarto extends CI_Controller {
    
    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('hospedaria/tipoquarto/listar');
    }
    
    public function listar() {
        $dados['tipo'] = $this->db->get('hospedaria_tipo_quarto')->result();
        $this->load->view('hospedaria/tipo_quarto/listar', $dados);
    }
    
    public function add() {
        $this->load->view('hospedaria/tipo_quarto/add');
    }

    public function addPost() {
        $data['preco'] = $this->input->post('preco');
        $data['descricao_tipo'] = $this->input->post('descricao');

        if($this->db->insert('hospedaria_tipo_quarto', $data)){
            redirect('hospedaria/tipoquarto');
        }
    }
    
    public function remover($id = null) {
        $this->verificar_acesso();
        
        $this->db->where('id_tipo_quarto', $id);
        $this->db->delete('hospedaria_tipo_quarto');
        
        redirect('hospedaria/tipoquarto');
    }

}
