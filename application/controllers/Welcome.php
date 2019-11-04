<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        $this->verificar_acesso();        
        redirect('welcome/dashboard');
    }
    
    public function dashboard() {
        $this->verificar_acesso(); 
        $this->db->where('estado', 2);
        $dados['alunos'] = $this->db->get('aluno')->result();
        $this->session->set_userdata('pre', count($dados['alunos']));
        
        $dados['turmas'] = $this->db->get('turma')->result();
        $dados['cursos'] = $this->db->get('curso')->result();
        $dados['alunos'] = $this->db->get('aluno')->result();
        $dados['inscricoes'] = $this->db->get('turma_aluno')->result();
        
        $this->load->view('dashboard', $dados);
    }
    
    public function entrar() {
        //$this->verificar_acesso();
        $this->load->view('login');
    }

}
