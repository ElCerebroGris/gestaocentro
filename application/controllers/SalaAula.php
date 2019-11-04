<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SalaAula extends CI_Controller {

    public function nivel_usuario() {
        if ($this->session->userdata('nivel') == 0) {
            redirect('professor');
        } else {
            redirect('exame/exames');
        }
    }
    
    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('salaaula/listar');
    }
    
    public function listar() {
        $dados['salas'] = $this->db->get('sala_de_aula')->result();
        $this->load->view('sala_aula/listar', $dados);
    }
    
    public function add() {
        $this->load->view('sala_aula/add');
    }
    
    public function ver($id = null) {
        $this->load->view('aluno/ver');
    }

    public function addPost() {
        $this->load->model('Sala_Model', 'sala');
        if ($this->sala->adicionar()) {
            redirect('salaaula');
        }
    }
    
    public function remover($id = null) {
        $this->verificar_acesso();
        $this->db->where('id_sala_de_aula', $id);
        $dados['salas'] = $this->db->get('sala_de_aula')->result();
        
        $this->db->where('id_sala_de_aula', $id);
        $this->db->delete('sala_de_aula');
        
        $this->load->model('Log_Model', 'log_model');
        $sms = 'removeu a sala ' . $dados['salas'][0]->sala_descricao . ' do sistema';
        $this->log_model->adicionar('Remover', $sms);
        
        redirect('salaaula');
    }

}
