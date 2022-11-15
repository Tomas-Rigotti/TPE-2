<?php

class LibrosModel {

    function conectarDB(){
        $db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
        return $db;
    }
    
    function obtenerTodos($select, $sort = null, $orden = null, $comienzo = null, $fin = null){ 
        $db = $this->conectarDB();

        $consulta = "SELECT $select FROM libros";

        
        if($sort != null && $orden != null){
            $consulta = "SELECT $select FROM libros ORDER BY $sort $orden";
        }

        
        if($comienzo != null && $fin != null){
            $consulta = "SELECT $select FROM libros LIMIT $comienzo, $fin";
        }

        
        if($sort != null && $orden != null && $comienzo != null && $fin != null ){
            $consulta = "SELECT $select FROM libros ORDER BY $sort $orden LIMIT $comienzo, $fin";
        }

        $consulta = $db->prepare($consulta);
        $consulta->execute();
        $libros = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $libros;
    }

    function obtenerFiltro($buscar,$filtro){
        $db = $this->conectarDB();

        $consulta = $consulta = "SELECT * FROM libros WHERE $buscar LIKE '%$filtro%'";

        $consulta = $db->prepare($consulta);
        $consulta->execute();
        $libros = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $libros;

    }

    
    function obtener($id){ 
        $db = $this->conectarDB();
        $consulta = $db->prepare("SELECT libros.*, autores.nombre as autor, autores.id_autores as id_autor FROM libros INNER JOIN autores ON libros.id_autores_fk = autores.id_autores WHERE libros.id_libros = ?");
        $consulta->execute([$id]);
        $librosporID = $consulta->fetch(PDO::FETCH_OBJ);
        return $librosporID;
    }

    function agregar($titulo, $fecha_pub, $genero, $cantPaginas, $id_autores_fk){
        $db = $this->conectarDB();
        $consulta = $db->prepare("INSERT INTO libros (titulo, fecha_pub, genero, cantidad_pag, id_autores_fk) VALUES (?, ?, ?, ?, ?)");
        $consulta->execute([$titulo, $fecha_pub, $genero, $cantPaginas, $id_autores_fk]);
    }

}