<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller {

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
        redirect('turma/listar');
    }

    public function minhas() {
        $id = $this->session->userdata('id_usuario');

        $this->db->where('id_usuario', $id);
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $this->db->join('turma_estado', 'turma_estado.id_estado=turma.id_estado');
        $dados['turmas'] = $this->db->get('turma')->result();

        $this->load->view('turma/listarMinhas', $dados);
    }

    public function listar() {
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $this->db->join('turma_estado', 'turma_estado.id_estado=turma.id_estado');
        $dados['turmas'] = $this->db->get('turma')->result();

        $this->load->view('turma/listar', $dados);
    }

    public function add() {
        $dados['cursos'] = $this->db->get('curso')->result();
        $dados['salas'] = $this->db->get('sala_de_aula')->result();
        $dados['horarios'] = $this->db->get('horario')->result();
        $this->db->where('id_nivel_usuario', 5);
        $dados['usuarios'] = $this->db->get('usuario')->result();

        $this->load->view('turma/add', $dados);
    }

    public function addPost() {
        $this->load->model('Turma_Model', 'turma');
        if ($this->turma->adicionar()) {
            $this->session->set_flashdata('sms', 'Turma Adicionada com sucesso');
            $this->session->set_flashdata('tipo', 1);
            redirect('turma');
        } else {
            $this->session->set_flashdata('sms', 'Erro ao Adicionar Turma');
            $this->session->set_flashdata('tipo', -1);
        }
    }

    public function ver($id = null) {
        $this->db->where('id_turma', $id);
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $this->db->join('usuario', 'usuario.id_usuario=turma.id_usuario');
        $this->db->join('horario', 'horario.id_horario=turma.id_horario');
        $this->db->join('sala_de_aula', 'sala_de_aula.id_sala_de_aula=turma.id_sala_de_aula');
        $this->db->join('turma_estado', 'turma_estado.id_estado=turma.id_estado');
        $dados['turma'] = $this->db->get('turma')->result();

        //Alunos pre inscritos
        $this->db->where('id_turma', $id);
        $this->db->where('turma_aluno.estado', 1);
        $this->db->join('turma_aluno', 'turma_aluno.id_aluno=aluno.id_aluno');
        $dados['alunos1'] = $this->db->get('aluno')->result();

        //Alunos já inscritos
        $this->db->where('id_turma', $id);
        $this->db->where('turma_aluno.estado !=', 1);
        $this->db->join('turma_aluno', 'turma_aluno.id_aluno=aluno.id_aluno');
        $dados['alunos2'] = $this->db->get('aluno')->result();

        $this->load->view('turma/ver', $dados);
    }

    public function fechar($id = null) {
        $dados['id_estado'] = 2;
        $dados['inicio_dia'] = date('d');
        $dados['inicio_mes'] = date('m');
        $dados['inicio_ano'] = '20' . date('y');
        $this->db->where('id_turma', $id);
        $this->db->update('turma', $dados);

        $this->load->model('Log_Model', 'log_model');
        $sms = 'fechou a turma ' . $id . ' no sistema';
        $this->log_model->adicionar('Editar', $sms);

        redirect('turma/ver/' . $id);
    }

    public function terminar($id = null) {
        $dados['id_estado'] = 3;
        $dados['fim_dia'] = date('d');
        $dados['fim_mes'] = date('m');
        $dados['fim_ano'] = '20' . date('y');
        $dados['data_atualizacao'] = date('d/m/y');
        $this->db->where('id_turma', $id);
        $this->db->update('turma', $dados);

        //Mover os alunos para lista de cursos
        $this->db->where('id_turma', $id);
        $this->db->join('turma_aluno', 'turma_aluno.id_aluno=aluno.id_aluno');
        $dados['alunos'] = $this->db->get('aluno')->result();
        foreach ($dados['alunos'] as $aluno) {
            $data['id_aluno'] = $aluno->id_aluno;

            $data2['estado'] = 3;
            $this->db->where('id_turma', $id);
            $this->db->where('id_aluno', $data['id_aluno']);
            $this->db->update('turma_aluno', $data2);

            $this->db->where('id_turma', $id);
            $dados['turma'] = $this->db->get('turma')->result();
            $data['id_curso'] = $dados['turma'][0]->id_curso;
            $this->db->insert('curso_aluno', $data);
        }

        $this->load->model('Log_Model', 'log_model');
        $sms = 'terminou a turma ' . $id . ' no sistema';
        $this->log_model->adicionar('Editar', $sms);

        redirect('turma/ver/' . $id);
    }

    public function abrir($id = null) {
        $dados['id_estado'] = 1;
        $this->db->where('id_turma', $id);
        $this->db->update('turma', $dados);

        $this->load->model('Log_Model', 'log_model');
        $sms = 'abriu a turma ' . $id_turma . ' do sistema';
        $this->log_model->adicionar('Editar', $sms);

        redirect('turma/ver/' . $id);
    }

    public function anularMatricula($id_turma, $id_aluno) {
        $this->db->where('id_turma', $id_aluno);
        $this->db->where('id_turma', $id_turma);
        $this->db->delete('turma_aluno');

        $this->load->model('Log_Model', 'log_model');
        $sms = 'anulou a matricula de ' . $id_aluno . ' do sistema na turma ' . $id_turma;
        $this->log_model->adicionar('Remover', $sms);

        redirect('turma/ver/' . $id_turma);
    }

    public function remover($id = null) {
        $this->verificar_acesso();
        $this->db->where('id_turma', $id);
        $dados['turmas'] = $this->db->get('turma')->result();

        //Eliminar relação aluno turma
        $this->db->where('id_turma', $id);
        $this->db->delete('turma_aluno');

        $this->db->where('id_turma', $id);
        $this->db->delete('turma');

        $this->load->model('Log_Model', 'log_model');
        $sms = 'removeu a turma ' . $dados['turmas'][0]->turma_nome . ' do sistema';
        $this->log_model->adicionar('Remover', $sms);

        redirect('turma');
    }

    public function fichaAluno($id_aluno = null, $id_turma = null) {
        $this->load->model('Turma_Model', 'turma');
        $this->turma->fichaAluno($id_aluno, $id_turma);
    }

}
