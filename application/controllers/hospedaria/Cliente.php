<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

    public function index() {
        redirect('hospedaria/cliente/listar');
    }

    public function listar() {
        $dados['clientes'] = $this->db->get('hospedaria_cliente')->result();
        $this->load->view('hospedaria/cliente/listar', $dados);
    }

    public function checkin($id_cliente = null) {

        $this->db->where('id_aluno', $id_aluno);
        $dados['aluno'] = $this->db->get('aluno')->result();

        $this->db->join('sala_de_aula', 'sala_de_aula.id_sala_de_aula=turma.id_sala_de_aula');
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $this->db->where('id_estado', 1);
        $dados['turmas'] = $this->db->get('turma')->result();

        $this->load->view('aluno/matricula', $dados);
    }

    public function add() {
        $this->db->where('estado', 1);
        $this->db->join('hospedaria_tipo_quarto', 'hospedaria_tipo_quarto.id_tipo_quarto=hospedaria_quarto.id_tipo');
        $dados['quartos'] = $this->db->get('hospedaria_quarto')->result();
        
        $this->load->view('hospedaria/cliente/add', $dados);
    }
    
    public function addPost() {
        $data['nome_cliente'] = $this->input->post('nome');
        $data['bi_num'] = $this->input->post('bi_num');
        $data['sexo'] = $this->input->post('sexo');
        $data['data_criacao'] = date('d/m') . '/20' . date('y');

        if ($this->db->insert('hospedaria_cliente', $data)) {
            $this->db->where('bi_num', $data['bi_num']);
            $dados['clientes'] = $this->db->get('hospedaria_cliente')->result();
            $id_cliente = $dados['clientes'][0]->id_cliente;

            //Adicionar no quarto
            $data2['id_quarto'] = $this->input->post('id_quarto');
            $data2['id_cliente'] = $id_cliente;
            $data2['entrada'] = $data['data_criacao'];
            $this->db->insert('hospedaria_cliente_quarto', $data2);
            
            //Update Quarto para Ocupado
            $data3['estado'] = 2;
            $this->db->where('id_quarto', $data2['id_quarto']);
            $this->db->update('hospedaria_quarto', $data3);

            redirect('hospedaria/cliente/listar');
        }
    }

    public function ver($id = null) {
        $this->db->where('id_aluno', $id);
        $dados['alunos'] = $this->db->get('aluno')->result();

        //Cursos concluidos
        $this->db->where('id_aluno', $id);
        $this->db->join('curso_aluno', 'curso_aluno.id_curso=curso.id_curso');
        $dados['cursos'] = $this->db->get('curso')->result();

        $this->load->view('aluno/ver', $dados);
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
