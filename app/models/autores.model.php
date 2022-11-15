<?php

class AutoresModel {

    function conectarDB(){
        $db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
        return $db;
    }
    
    function obtenerAutores(){
        $db = $this->conectarDB();
        $consulta = $db->prepare("SELECT * FROM autores");
        $consulta->execute();
        $autores = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $autores;
    }

 

    function agregarAutor($nombre, $lugar_nac, $fecha_nac){
        $db = $this->conectarDB();
        $consulta = $db->prepare("INSERT INTO `autores`(`nombre`, `lugar_nac`, `fecha_nac`) VALUES (?,?,?)");
        $consulta->execute([$nombre, $lugar_nac, $fecha_nac]);
        
    }

    function borrarAutor($id){
        $db = $this->conectarDB();
        $consulta = $db->prepare("DELETE FROM autores WHERE id_autores = ?"); 
        $consulta->execute([$id]);
    }

    public function obtenerAutorPorID($id){
        $db = $this->conectarDB();
        $consulta = $db->prepare("SELECT * FROM `autores` WHERE id_autores = ?"); 
        $consulta->execute([$id]);
        $autor = $consulta->fetch(PDO::FETCH_OBJ);
        return $autor;
    }

    function editarAutor($nombre, $lugar_nac, $fecha_nac, $id){
        $db = $this->conectarDB();
        $consulta = $db->prepare("UPDATE autores SET nombre=?, lugar_nac=?, fecha_nac=? WHERE id_autores =?");
        $consulta->execute([$nombre, $lugar_nac, $fecha_nac, $id]);
        
    }
}


