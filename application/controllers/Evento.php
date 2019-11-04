<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {

    public function nivel_usuario() {
        if ($this->session->userdata('nivel') == 0) {
            redirect('professor');
        } else {
            redirect('exame/exames');
        }
    }

    public function index() {
        redirect('curso/listar');
    }

    public function listar() {
        //$dados['cursos'] = $this->db->get('curso')->result();
        $this->load->view('evento/listar');
    }

    public function add() {
        $this->load->view('evento/add');
    }

    public function ver($id = null) {
        $this->db->where('id_aluno', $id);
        $this->db->join("curso", "curso_aluno.id_curso = curso.id_curso");
        $dados['cursos'] = $this->db->get('curso_aluno')->result();
        $this->load->view('aluno/ver');
    }

    public function addPost() {
        $this->load->model('Curso_Model', 'curso');
        if ($this->curso->adicionar()) {
            redirect('curso');
        }
    }
    
    public function relatoriomensal($mes=null) {
        $this->load->model('Curso_Model', 'curso');
        $this->curso->relatorio_mensal($mes);
    }
    

}
