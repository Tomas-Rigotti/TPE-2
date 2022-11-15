<?php
require_once './app/models/libros.model.php';
require_once './app/views/api.view.php';

class LibrosApiController {
    private $model;

    private $data;

    public function __construct() {
        $this->model = new LibrosModel();
        $this->view = new ApiView();

        $this->data = file_get_contents("php://input");
    }

    private function conseguirData(){
        return json_decode($this->data);
    }


    public function obtenerLibros($params = null) {

        $columnas = array(  'id_libros' => 'id_libros',
                            'titulo' => 'titulo',
                            'fecha_pub' => 'fecha_pub',
                            'genero' => 'genero',
                            'cantidad_pag' => 'cantidad_pag',
                            'id_autores_fk' => 'id_autores_fk'
                        );

        $select = $_GET["select"] ?? "*";
        $sort = $_GET["sort"] ?? null;
        $orden = $_GET["orden"] ?? null; 
        $comienzo = $_GET["comienzo"] ?? null;
        $fin = $_GET["fin"] ?? null;

        $buscar = $_GET["buscar"] ?? null;
        $filtro = $_GET["filtro"] ?? null;
    
        
        if(in_array($select,$columnas) || $select == "*" && $buscar == null && $filtro == null){
            if (isset($sort) && isset($orden) && isset($comienzo) && isset($fin)){
                if(is_numeric($comienzo) == true && is_numeric($fin) == true) {
                    $libros = $this->model->obtenerTodos($select, $sort, $orden, $comienzo, $fin);
                    $this->view->response($libros, 200);
                } else {
                    $this->view->response("datos ingresados incorrectos", 404);
                } 
            } else if ($sort == null && $orden == null && isset($comienzo) && isset($fin)){
                if(is_numeric($comienzo) == true && is_numeric($fin) == true) {
                    $libros = $this->model->obtenerTodos($select, $comienzo, $fin);
                    $this->view->response($libros, 200);
                } else {
                    $this->view->response("datos ingresados incorrectos", 404);
                } 
            } else if (isset($select) && isset($sort) && isset($orden)){
                if(strtoupper($orden) == "ASC" || strtoupper($orden) == "DESC"){
                    $libros = $this->model->obtenerTodos($select, $sort, $orden);
                    $this->view->response($libros, 200);
                } else {
                    $this->view->response("datos ingresados incorrectos", 404);
                }
            }else if(!isset($sort) && !isset($orden)){
                    $libros = $this->model->obtenerTodos($select);
                    $this->view->response($libros, 200);
                } else {
                $this->view->response("datos ingresados incorrectos", 404);
            }
        } else if (isset($buscar) && in_array($buscar,$columnas) && isset($filtro) && !isset($sort)){
            $libros = $this->model->obtenerFiltro($buscar, $filtro);
            $this->view->response($libros, 200);
        } else {
            $this->view->response("datos ingresados incorrectos", 404);
        }

}


    public function obtenerLibro($params = null) {
        $id = $params[':ID'];
        $libro = $this->model->obtener($id);


        if ($libro)
            $this->view->response($libro, 200);
        else 
            $this->view->response("La tarea con el id=$id no existe", 404);
    }

    public function agregarLibro($params = null){
        $libro = $this->conseguirData();

        if (empty($libro->titulo) || empty($libro->fecha_pub) || empty($libro->genero) || empty($libro->cantidad_pag) || empty($libro->id_autores_fk)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->model->agregar($libro->titulo, $libro->fecha_pub, $libro->genero, $libro->cantidad_pag, $libro->id_autores_fk);
            $task = $this->model->obtener($id);
            $this->view->response($task, 201);
        }
    }
    
    
}