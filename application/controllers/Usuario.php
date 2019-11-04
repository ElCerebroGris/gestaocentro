<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
        redirect('usuario/listar');
    }

    public function listar() {
        $this->db->join('nivel_usuario', 'nivel_usuario.id_nivel_usuario=usuario.id_nivel_usuario');
        $dados['usuarios'] = $this->db->get('usuario')->result();

        $this->load->view('usuario/listar', $dados);
    }

    public function add() {
        $dados['nivel'] = $this->db->get('nivel_usuario')->result();
        $this->load->view('usuario/add', $dados);
    }

    public function addPost() {
        $this->load->model('Usuario_Model', 'usuario');
        if ($this->usuario->adicionar()) {
            redirect('usuario');
        }
    }

    public function sair() {
        $this->verificar_acesso();

        $this->load->model('Log_Model', 'log_model');
        $sms = 'Usuario ' . $this->session->userdata('nome_usuario') . ' saiu do sistema';
        $this->log_model->adicionar('Sair', $sms);

        $this->session->sess_destroy();
        redirect('welcome');
    }

    public function entrarPost() {
        $nome_usuario = $this->input->post('usuario');
        $senha = $this->input->post('senha');

        $this->db->where('nome_usuario', $nome_usuario);
        $this->db->where('senha', $senha);
        $this->db->join('nivel_usuario', 'nivel_usuario.id_nivel_usuario=usuario.id_nivel_usuario');
        $data['usuarios'] = $this->db->get('usuario')->result();

        if (count($data['usuarios']) == 1) {
            $dados['id_usuario'] = $data['usuarios'][0]->id_usuario;
            $dados['nome_completo'] = $data['usuarios'][0]->nome_completo;
            $dados['nome_usuario'] = $data['usuarios'][0]->nome_usuario;
            $dados['logado'] = true;
            $dados['nivel'] = $data['usuarios'][0]->id_nivel_usuario;
            $dados['descricao'] = $data['usuarios'][0]->descricao;
            $this->session->set_userdata($dados);

            $this->load->model('Log_Model', 'log_model');
            $sms = 'Usuario ' . $this->session->userdata('nome_usuario') . ' entrou no sistema';
            $this->log_model->adicionar('Entrar', $sms);
        }
        redirect('welcome');
    }

    public function remover($id = null) {
        $this->verificar_acesso();
        $this->db->where('id_usuario', $id);
        $dados['usuarios'] = $this->db->get('usuario')->result();

        //$this->nivel_usuario();
        $this->db->where('id_usuario', $id);
        $this->db->delete('usuario');


        $this->load->model('Log_Model', 'log_model');
        $sms = 'removeu o usuario ' . $dados['usuarios'][0]->nome_usuario . ' do sistema';
        $this->log_model->adicionar('Remover', $sms);

        redirect('usuario');
    }

}
