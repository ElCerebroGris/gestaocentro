<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller {

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
        redirect('curso/listar');
    }

    public function listar() {
        $dados['cursos'] = $this->db->get('curso')->result();
        $this->load->view('curso/listar', $dados);
    }

    public function add() {
        $this->load->view('curso/add');
    }

    public function ver($id = null) {
        $this->db->where('curso.id_curso', $id);
        $dados['cursos'] = $this->db->get('curso')->result();
        
        $this->db->where('curso_aluno.id_curso', $id);
        $this->db->join('curso_aluno', 'curso_aluno.id_aluno=aluno.id_aluno');
        $dados['alunos'] = $this->db->get('aluno')->result();
        
        $this->load->view('curso/ver', $dados);
    }

    public function addPost() {
        $this->load->model('Curso_Model', 'curso');
        if ($this->curso->adicionar()) {
            redirect('curso');
        }
    }
    
    public function remover($id = null) {
        $this->verificar_acesso();
        $this->db->where('id_curso', $id);
        $dados['cursos'] = $this->db->get('curso')->result();
        
        $this->db->where('id_curso', $id);
        $this->db->delete('curso');
        
        $this->load->model('Log_Model', 'log_model');
        $sms = 'removeu o curso ' . $dados['cursos'][0]->curso_nome . ' do sistema';
        $this->log_model->adicionar('Remover', $sms);
        
        redirect('curso');
    }
    
    public function relatoriomensal($mes=null) {
        $this->load->model('Curso_Model', 'curso');
        $this->curso->relatorio_mensal($mes);
    }
    

}
