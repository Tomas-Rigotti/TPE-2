## Importar la base de datos
- importar desde PHPMyAdmin (o cualquiera) database/tpe.sql

## Endpoint de la API:
http://localhost/carpetalocal/TPE2/api/libros

## Funcionalidades de la API:

-Obtener todos los items: 
http://localhost/carpetalocal/TPE2/api/libros

-Obtener item por su ID:
http://localhost/carpetalocal/TPE2/api/libros/:ID

-Obtener cualquier columna de la tabla:
http://localhost/carpetalocal/TPE2/api/libros?select=[COLUMNA]
Ejemplo
http://localhost/carpetalocal/TPE2/api/libros?select=genero

-Obtener cualquier columna de la tabla ordenada (ascendente o descendente):
http://localhost/carpetalocal/TPE2/api/libros?sort=[NOMBRE DE LA COLUMNA]&orden=[ASC o DESC]
Ejemplo
http://localhost/carpetalocal/TPE2/api/libros?sort=id_libros&orden=asc

-Obtener cualquier columna paginada:
http://localhost/carpetalocal/TPE2/api/libros?comienzo=0&fin=5

-Obtener cualquier columna paginada y ordenada
http://localhost/carpetalocal/TPE2/api/libros?sort=[COLUMNA]&orden=[ASC o DESC]&comienzo=0&fin=5
Ejemplo
http://localhost/carpetalocal/TPE2/api/libros?sort=id_libros&orden=asc&comienzo=0&fin=5

-Buscar un texto particular en una columna
http://localhost/WEB2/TPE2/api/libros?buscar=[COLUMNA]&filtro=[PALABRA A BUSCAR]
Ejemplo
http://localhost/WEB2/TPE2/api/libros?buscar=titulo&filtro=resplandor

-Crear un nuevo item:
http://localhost/carpetalocal/TPE2/api/libros
Objeto que se debe enviar:
{
    "titulo": "TITULO",
    "fecha_pub": "12/11/2022",
    "genero": "GENERO",
    "cantidad_pag": 150,
    "id_autores_fk": 3,
    "id_autor": 3
}
