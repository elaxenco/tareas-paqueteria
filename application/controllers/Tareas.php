<?php
defined('BASEPATH') OR exit('Sin permisos');

class Tareas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('token')) {
            redirect('login');
        }
    } 

    public function index() {
        $this->load->model('Tarea');
        $usuario_id = $this->session->userdata('usuario_id');
        $filtro = $this->input->get('buscar') ?? '';
        $tareas = $this->Tarea->obtener_todas($usuario_id, $filtro);
    
        $this->load->view('sidebar', [
            'titulo' => 'Gestión de Tareas',
            'vista' => 'tareas',
            'datos' => ['tareas' => $tareas, 'filtro' => $filtro]
        ]);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
    
    public function crear() {
        $this->load->model('Tarea');
        $data = [
            'usuario_id' => $this->session->userdata('usuario_id'),
            'titulo' => ucfirst(strtolower($this->input->post('titulo'))),
            'descripcion' => $this->input->post('descripcion')
        ];
        $this->Tarea->crear($data);
        redirect('tareas');
    }

    public function completar($id) {
        $this->load->model('Tarea');
        $this->Tarea->actualizar($id, ['completada' => 1]);
        redirect('tareas');
    }
    
    public function eliminar($id) {
        $this->load->model('Tarea');
        $this->Tarea->eliminar($id);
        redirect('tareas');
    }
    
    public function editar($id) {
        $this->load->model('Tarea');
        $tarea = $this->Tarea->obtener_por_id($id);
        if (!$tarea) show_404();
    
        $this->load->view('tarea_editar', ['tarea' => $tarea]);
    }
    
    public function actualizar($id) {
        $this->load->model('Tarea');
        $data = [
            'titulo' => ucfirst(strtolower($this->input->post('titulo'))),
            'descripcion' => $this->input->post('descripcion')
        ];
        $this->Tarea->actualizar($id, $data);
        redirect('tareas');
    }

    public function externas() {
        $limite_total = (int) $this->input->get('limite') ?: 5;
        $pagina_actual = (int) $this->input->get('pagina') ?: 1;
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/todos');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);
        curl_close($ch);
    
        $data = json_decode($response, true);
        $total_datos = min($limite_total, count($data));
    
        // Si pide <= 10, no hay paginación
        if ($limite_total <= 10) {
            $tareas = array_slice($data, 0, $limite_total);
            $total_paginas = 1;
        } else {
            $inicio = ($pagina_actual - 1) * 10;
            $tareas = array_slice($data, $inicio, 10);
            $total_paginas = ceil($limite_total / 10);
        }
    
        $this->load->view('sidebar', [
            'titulo' => 'Tareas Externas',
            'vista' => 'tareas_externas',
            'datos' => [
                'tareas' => $tareas,
                'cantidad' => $limite_total,
                'pagina_actual' => $pagina_actual,
                'total_paginas' => $total_paginas
            ]
        ]);
    }
    
    
    

    public function numero_a_palabra() {
        $resultado = null;
    
        if ($this->input->post('numero')) {
            $numero = $this->input->post('numero');
            try {
                $client = new SoapClient("https://www.dataaccess.com/webservicesserver/NumberConversion.wso?WSDL");
                $response = $client->NumberToWords(['ubiNum' => $numero]);
                $resultado = $response->NumberToWordsResult;
            } catch (Exception $e) {
                $resultado = 'Error al conectarse al servicio.';
            }
        }
     
        $this->load->view('sidebar', [
            'titulo' => 'Numero palabras',
            'vista' => 'numero_a_palabra',
            'datos' => ['resultado' => $resultado]
        ]);
    }
}
