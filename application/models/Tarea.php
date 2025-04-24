<?php
defined('BASEPATH') OR exit('Sin permiso');

class Tarea extends CI_Model {

    public function obtener_todas($usuario_id, $filtro = '') {
        if ($filtro) {
            $this->db->like('titulo', $filtro);
        }
        return $this->db->get_where('tareas', ['usuario_id' => $usuario_id])->result();
    }

    public function crear($data) {
        return $this->db->insert('tareas', $data);
    }

    public function actualizar($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tareas', $data);
    }

    public function eliminar($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tareas');
    }

    public function obtener_por_id($id) {
        return $this->db->get_where('tareas', ['id' => $id])->row();
    }
}
