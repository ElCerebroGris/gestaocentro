<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

class Pagamento extends CI_Controller {

    public function nivel_usuario() {
        if ($this->session->userdata('nivel') == 0) {
            redirect('professor');
        } else {
            redirect('exame/exames');
        }
    }

    public function index() {
        redirect('pagamento/listar');
    }

    public function verificar_acesso() {
        if (!$this->session->userdata('logado')) {
            redirect('welcome/entrar');
        }
    }

    public function recibo($id = null) {
        $this->db->where('pagamento.id_pagamento', $id);
        $this->db->join('aluno', 'aluno.id_aluno=pagamento.id_aluno');
        $this->db->join('turma', 'turma.id_turma=pagamento.id_turma');
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $this->db->join('tipo_pagamento', 'tipo_pagamento.id_tipo_pagamento=pagamento.id_tipo_pagamento');
        $dados['pagamento'] = $this->db->get('pagamento')->result();

        $msg = $this->load->view('pdf/recibo', $dados, true);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin-left' => 50]);
        $html = $msg;
        $mpdf->SetJS('this.print();');
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    public function listar() {
        $this->verificar_acesso();
        $this->db->join('aluno', 'aluno.id_aluno=pagamento.id_aluno');
        $this->db->join('turma', 'turma.id_turma=pagamento.id_turma');
        $this->db->join('tipo_pagamento', 'tipo_pagamento.id_tipo_pagamento=pagamento.id_tipo_pagamento');
        $dados['pagamentos'] = $this->db->get('pagamento')->result();
        $this->load->view('pagamento/listar', $dados);
    }

    public function add($id_aluno, $id_turma) {
        $this->verificar_acesso();
        $this->db->where('id_aluno', $id_aluno);
        $dados['alunos'] = $this->db->get('aluno')->result();

        $this->db->where('id_turma', $id_turma);
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $dados['turma'] = $this->db->get('turma')->result();

        $this->load->view('pagamento/add', $dados);
    }

    public function addPost() {
        $this->load->model('Pagamento_Model', 'pagamento');
        if ($this->pagamento->adicionar()) {
            $id_aluno = $this->input->post('id_aluno');
            $id_turma = $this->input->post('id_turma');
            //Mudar estado do aluno na turma após pagar a matricula
            $tipo = $this->input->post('tipo');
            if ($tipo == 1) {
                $dados['estado'] = 2;
                $this->db->where('id_aluno', $id_aluno);
                $this->db->where('id_turma', $id_turma);
                $this->db->update('turma_aluno', $dados);
            }

            redirect('pagamento/listar');
        }
    }

    public function guiaPagamento($id_aluno, $id_turma) {
        $this->verificar_acesso();
        $this->load->model('Pagamento_Model', 'pagamento');
        $this->pagamento->guia_pagamento($id_aluno, $id_turma);
    }

    public function relatoriomensal($mes = null) {
        $this->verificar_acesso();
        $this->load->model('Curso_Model', 'curso');
        $this->curso->relatorio_mensal($mes);
    }

}
