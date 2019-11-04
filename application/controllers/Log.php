<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {

    public function nivel_usuario() {
        if ($this->session->userdata('nivel') == 0) {
            redirect('professor');
        } else {
            redirect('exame/exames');
        }
    }

    public function listar() {
        $this->db->join('usuario', 'usuario.id_usuario=log.id_usuario');
        $this->db->order_by('data DESC');
        $dados['logs'] = $this->db->get('log')->result();
        $this->load->view('logs', $dados);
    }    

}
