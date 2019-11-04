<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quarto extends CI_Controller {

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function index() {
        redirect('hospedaria/quarto/listar');
    }

    public function listar() {
        $this->db->join('hospedaria_tipo_quarto', 'hospedaria_tipo_quarto.id_tipo_quarto=hospedaria_quarto.id_tipo');
        $dados['quartos'] = $this->db->get('hospedaria_quarto')->result();

        for ($i = 0; $i < count($dados['quartos']); ++$i) {

            $this->db->where('id_quarto', $dados['quartos'][$i]->id_quarto);
            $this->db->order_by('id_cliente_quarto DESC');
            $this->db->join('hospedaria_cliente', 'hospedaria_cliente.id_cliente=hospedaria_cliente_quarto.id_cliente');
            $dados['clientes'] = $this->db->get('hospedaria_cliente_quarto')->result();

            if (count($dados['clientes']) > 0) {
                $dados['quartos'][$i]->id_cliente = $dados['clientes'][0]->id_cliente;
                $dados['quartos'][$i]->nome_cliente = $dados['clientes'][0]->nome_cliente;
            }
        }

        $this->load->view('hospedaria/quarto/listar', $dados);
    }

    public function add() {
        $dados['tipo'] = $this->db->get('hospedaria_tipo_quarto')->result();
        $this->load->view('hospedaria/quarto/add', $dados);
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
        $data['numero'] = $this->input->post('numero');
        $data['descricao'] = $this->input->post('descricao');
        $data['id_tipo'] = $this->input->post('id_tipo');

        if ($this->db->insert('hospedaria_quarto', $data)) {
            redirect('hospedaria/quarto/listar');
        }
    }

    public function remover($id = null) {
        $this->verificar_acesso();

        $this->db->where('id_quarto', $id);
        $this->db->delete('hospedaria_quarto');

        redirect('hospedaria/quarto/listar');
    }

    public function relatoriomensal($mes = null) {
        $this->load->model('Curso_Model', 'curso');
        $this->curso->relatorio_mensal($mes);
    }

}
