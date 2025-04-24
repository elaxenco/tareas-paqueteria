<?php
defined('BASEPATH') OR exit('Sin permiso');

class Usuario extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function registrar($data) {
        return $this->db->insert('usuarios', $data);
    }

    public function obtener_por_email($email) {
        return $this->db->get_where('usuarios', ['email' => $email])->row();
    }
}
