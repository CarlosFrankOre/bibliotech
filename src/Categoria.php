<?php
namespace Carlos\Bibliotech;

class Categoria
{
    private $idCategoria;
    private $nombre;
    private $descripcion;
    private $libros = [];

    public function __construct($idCategoria, $nombre, $descripcion)
    {
        $this->idCategoria = $idCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
}
?>