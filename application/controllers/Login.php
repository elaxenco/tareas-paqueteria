<?php
defined('BASEPATH') OR exit('Sin permisos');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('login');
    }

    public function registrar() {
        $this->load->model('Usuario');
    
        $nombre = $this->input->post('nombre');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        //VALIDAMOS SI EXISTE EL CORREO
        if ($this->Usuario->obtener_por_email($email)) {
            $this->session->set_flashdata('error', 'El correo ya está registrado.');
            redirect('login/registro');
            return;
        }
    
        $data = [
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password
        ];
    
        if ($this->Usuario->registrar($data)) {
            $this->session->set_flashdata('success', 'Usuario registrado con éxito. Ya puedes iniciar sesión.');
            redirect('login');
        } else {
            $this->session->set_flashdata('error', 'Error al registrar usuario.');
            redirect('login/registro');
        }
    }
    

    public function registro() {
        $this->load->view('registro');
    }

    public function loginUsuario() {
        $this->load->model('Usuario');
    
        $email = $this->input->post('email');
        $password = $this->input->post('password');
    
        $usuario = $this->Usuario->obtener_por_email($email);
    
        if ($usuario && password_verify($password, $usuario->password)) {
            $token = md5($email . time());
    
            $this->session->set_userdata([
                'usuario_id' => $usuario->id,
                'nombre'     => $usuario->nombre,
                'email'      => $usuario->email,
                'token'      => $token
            ]);
    
            redirect('tareas');
        } else {
            $this->session->set_flashdata('error', 'Correo o contraseña incorrectos');
            redirect('login');
        }
    }
    
}
