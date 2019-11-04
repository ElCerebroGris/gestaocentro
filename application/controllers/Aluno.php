<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {

    public function nivel_usuario() {
        if ($this->session->userdata('nivel') == 0) {
            redirect('professor');
        } else {
            redirect('exame/exames');
        }
    }

    public function index() {
        redirect('aluno/listar');
    }

    public function listar() {
        $dados['alunos'] = $this->db->get('aluno')->result();
        $this->load->view('aluno/listar', $dados);
    }

    public function listarPre() {
        $this->db->where('estado', 2);
        $dados['alunos'] = $this->db->get('aluno')->result();
        $this->load->view('aluno/listar_pre_inscritos', $dados);
    }

    public function matricula($id_aluno = null) {

        $this->db->where('id_aluno', $id_aluno);
        $dados['aluno'] = $this->db->get('aluno')->result();

        $this->db->join('sala_de_aula', 'sala_de_aula.id_sala_de_aula=turma.id_sala_de_aula');
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $this->db->where('id_estado', 1);
        $dados['turmas'] = $this->db->get('turma')->result();
        for ($x = 0; $x < count($dados['turmas']); ++$x) {
            $this->db->where('id_turma', $dados['turmas'][$x]->id_turma);
            $this->db->where('estado', 2);
            $dados['inscricoes'] = $this->db->get('turma_aluno')->result();

            $this->db->where('id_turma', $dados['turmas'][$x]->id_turma);
            $this->db->where('estado', 1);
            $dados['pre_inscricoes'] = $this->db->get('turma_aluno')->result();

            $dados['turmas'][$x]->vagas = $dados['turmas'][$x]->capacidade - count($dados['inscricoes']);
            $dados['turmas'][$x]->pre_vagas = count($dados['pre_inscricoes']);
        }

        $this->load->view('aluno/matricula', $dados);
    }

    public function matricularPost() {
        $this->load->model('Aluno_Model', 'aluno');
        $id_aluno = $this->aluno->matricularAluno();
        if ($id_aluno != null) {
            redirect('aluno/ver/' . $id_aluno);
        }
    }

    public function add() {
        $this->db->where('turma_estado.id_estado !=', 3);
        $this->db->join('turma_estado', 'turma_estado.id_estado=turma.id_estado');
        $this->db->join('sala_de_aula', 'sala_de_aula.id_sala_de_aula=turma.id_sala_de_aula');
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $dados['turmas'] = $this->db->get('turma')->result();
        
        if(count($dados['turmas'])==0){
            $this->session->set_flashdata('sms', 'Precisa Adicionar uma Turma para registrar Aluno');
            redirect('welcome/dashboard');
        }
        
        for ($x = 0; $x < count($dados['turmas']); ++$x) {
            $this->db->where('id_turma', $dados['turmas'][$x]->id_turma);
            $this->db->where('estado', 2);
            $dados['inscricoes'] = $this->db->get('turma_aluno')->result();

            $this->db->where('id_turma', $dados['turmas'][$x]->id_turma);
            $this->db->where('estado', 1);
            $dados['pre_inscricoes'] = $this->db->get('turma_aluno')->result();

            $dados['turmas'][$x]->vagas = $dados['turmas'][$x]->capacidade - count($dados['inscricoes']);
            $dados['turmas'][$x]->pre_vagas = count($dados['pre_inscricoes']);
        }

        $this->load->view('aluno/add', $dados);
    }

    public function ver($id = null) {
        $this->db->where('id_aluno', $id);
        $dados['alunos'] = $this->db->get('aluno')->result();

        //Turmas Pré inscritas
        $this->db->where('id_aluno', $id);
        $this->db->where('estado', 1);
        $this->db->join('turma_aluno', 'turma_aluno.id_turma=turma.id_turma');
        $dados['turmas'] = $this->db->get('turma')->result();

        //Turmas inscritas
        $this->db->where('id_aluno', $id);
        $this->db->where('estado', 2);
        $this->db->join('turma_aluno', 'turma_aluno.id_turma=turma.id_turma');
        $dados['turmas2'] = $this->db->get('turma')->result();

        //Cursos concluidos
        $this->db->where('id_aluno', $id);
        $this->db->join('curso_aluno', 'curso_aluno.id_curso=curso.id_curso');
        $dados['cursos'] = $this->db->get('curso')->result();

        $this->load->view('aluno/ver', $dados);
    }

    public function addPost() {
        $this->load->model('Aluno_Model', 'aluno');
        $id_aluno = $this->aluno->adicionar();
        if ($id_aluno != null) {
            redirect('aluno/ver/' . $id_aluno);
        }
    }
    
    public function editar($id=null) {
        $this->db->where('id_aluno', $id);
        $dados['alunos'] = $this->db->get('aluno')->result();
        
        $this->load->view('aluno/editar', $dados);
    }
    
    public function editarPost() {
        $this->load->model('Aluno_Model', 'aluno');
        $id_aluno = $this->aluno->editar();
        if ($id_aluno != null) {
            redirect('aluno/ver/' . $id_aluno);
        }
    }
    
    public function remover($id = null) {
        
        $this->db->where('id_aluno', $id);
        $dados['alunos'] = $this->db->get('aluno')->result();
        
        $this->db->where('id_aluno', $id);
        $this->db->delete('turma_aluno');
        
        $this->db->where('id_aluno', $id);
        $this->db->delete('curso_aluno');
        
        $this->db->where('id_aluno', $id);
        $this->db->delete('aluno');
        
        $this->load->model('Log_Model', 'log_model');
        $sms = 'removeu o aluno ' . $dados['alunos'][0]->aluno_nome . ' do sistema';
        $this->log_model->adicionar('Remover', $sms);
        
        redirect('aluno');
    }

}
