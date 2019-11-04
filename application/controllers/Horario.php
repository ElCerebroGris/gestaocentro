<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Horario extends CI_Controller {

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
        redirect('horario/listar');
    }
    
    public function listar() {
        $dados['horarios'] = $this->db->get('horario')->result();
        
        $this->load->view('horario/listar', $dados);
    }
    
    public function add() {
        $this->load->view('horario/add');
    }

    public function addPost() {
        $this->load->model('Horario_Model', 'horario');
        if ($this->horario->adicionar()) {
            redirect('horario');
        }
    }
    
    public function remover($id = null) {
        $this->verificar_acesso();
        $this->db->where('id_horario', $id);
        $dados['horarios'] = $this->db->get('horario')->result();
        
        //$this->nivel_usuario();
        $this->db->where('id_horario', $id);
        $this->db->delete('horario');
        
        $this->load->model('Log_Model', 'log_model');
        $sms = 'removeu o horario ' . $dados['horarios'][0]->horario_descricao . ' do sistema';
        $this->log_model->adicionar('Remover', $sms);
        
        redirect('horario');
    }

}
