<?php
namespace Carlos\Bibliotech;

class Editorial
{
    private $idEditorial;
    private $nombre;
    private $direccion;
    private $telefono;
    //private $libros = [];

    public function __construct($idEditorial, $nombre, $direccion, $telefono)
    {
        $this->idEditorial = $idEditorial;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    public function getIdEditorial()
    {
        return $this->idEditorial;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDireccion(){
        return $this->direccion;
    }
}
?>