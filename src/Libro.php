<?php
namespace Carlos\Bibliotech;
class Libro
{
    private $isbn;
    private $titulo;
    private $anioPublicacion;
    private $resumen;
    public $editorial;
    public $categoria;
    public $autores = [];

    // Propiedad estática para almacenar todos los libros
    private static $libros = [];

    public function __construct($isbn, $titulo, $anioPublicacion, $resumen, Editorial $editorial, Categoria $categoria, array $autores)
    {
        $this->isbn = $isbn;
        $this->titulo = $titulo;
        $this->anioPublicacion = $anioPublicacion;
        $this->resumen = $resumen;
        $this->editorial = $editorial;
        $this->categoria = $categoria;
        $this->autores = $autores;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }
    public function getAnioPublicacion(){
        return $this->anioPublicacion;
    }

    // Métodos estáticos para la gestión de Libros
    public static function agregarLibro(Libro $libro)
    {
        self::$libros[$libro->isbn] = $libro;
        return true;
    }

    public static function editarLibro($isbn, $nuevosDatos)
    {
        if (isset(self::$libros[$isbn])) {
            self::$libros[$isbn] = $nuevosDatos;
            return true;
        }
        return false;
    }

    public static function eliminarLibro($isbn)
    {
        if (isset(self::$libros[$isbn])) {
            unset(self::$libros[$isbn]);
            return true;
        }
        return false;
    }

    public static function buscarLibro($criterio)
    {
        $resultados = [];
        foreach (self::$libros as $libro) {
            if (stripos($libro->getTitulo(), $criterio) !== false) {
                $resultados[] = $libro;
            }
        }
        return $resultados;
    }

    public static function getLibros()
    {
        return self::$libros;
    }
    public function getAutores()
    {
        return $this->autores;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
}