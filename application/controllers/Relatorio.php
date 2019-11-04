<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {

    public function gerar() {
        $this->load->view('relatorio');
    }

    public function gerarPost() {
        $tipo = $this->input->post('tipo');
        $inicio = $this->input->post('inicio');
        //$inicio = str_ireplace('-', '/', $inicio);
        $fim = $this->input->post('fim');
        //$fim = str_ireplace('-', '/', $fim);
        if ($tipo == 1) {
            redirect('relatorio/relatoriomensal/' . $inicio . '/' . $fim);
        } else {
            redirect('relatorio/mapa/' . $inicio . '/' . $fim);
        }
    }

    public function relatoriomensal($inicio, $fim) {
        $this->load->model('Curso_Model', 'curso');
        $this->curso->relatorio_mensal($inicio, $fim);
    }

    public function mapa($inicio, $fim) {

        $ano1 = str_split($inicio, 4)[0];
        $mes1 = str_split($inicio)[5].str_split($inicio)[6];
        $dia1 = str_split($inicio, 2)[4];
        $ano2 = str_split($fim, 4)[0];
        $mes2 = str_split($fim)[5].str_split($fim)[6];
        $dia2 = str_split($fim, 2)[4];
        
        $dados['inicio'] = $dia1.'-'.$mes1.'-'.$ano1;
        $dados['fim'] = $dia2.'-'.$mes2.'-'.$ano2;
        
        $this->db->where('turma.fim_dia >=', $dia2);
        $this->db->where('turma.fim_mes >=', $mes2);
        $this->db->where('turma.fim_ano >=', $ano2);
        $this->db->where('turma.inicio_dia >=', $dia1);
        $this->db->where('turma.inicio_mes >=', $mes1);
        $this->db->where('turma.inicio_ano >=', $ano1);
        $this->db->join('curso', 'curso.id_curso=turma.id_curso');
        $this->db->join('horario', 'horario.id_horario=turma.id_horario');
        $this->db->join('usuario', 'usuario.id_usuario=turma.id_usuario');
        $dados['turmas'] = $this->db->get('turma')->result();

        $totalF = 0;
        $totalV = 0;

        for ($x = 1; $x <= count($dados['turmas']); ++$x) {
            $this->db->where('id_turma', $dados['turmas'][$x - 1]->id_turma);
            $data['alunos'] = $this->db->get('turma_aluno')->result();
            $dados['turmas'][$x - 1]->alunos = count($data['alunos']);
            $dados['turmas'][$x - 1]->valor = $dados['turmas'][$x - 1]->curso_preco * count($data['alunos']);
            $totalF += count($data['alunos']);
            $totalV += $dados['turmas'][$x - 1]->valor;
        }

        $dados['totalF'] = $totalF;
        $dados['totalV'] = $totalV;

        $msg = $this->load->view('pdf/mapa_mensal', $dados, true);

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin-left' => 50]);
        $html = $msg;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

}
