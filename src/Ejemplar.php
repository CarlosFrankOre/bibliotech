<?php
namespace Carlos\Bibliotech;
class Ejemplar
{
    private $idEjemplar;
    public $libro;
    private $estado;

    public function __construct($idEjemplar, Libro $libro, $estado)
    {
        $this->idEjemplar = $idEjemplar;
        $this->libro = $libro;
        $this->estado = $estado;
    }

    public function getIdEjemplar()
    {
        return $this->idEjemplar;
    }

    public function getLibro()
    {
        return $this->libro;
    }

    public function getEstado()
    {
        return $this->estado;
    }


    public function editarEstado($nuevoEstado)
    {
        $this->estado = $nuevoEstado;
    }
}
?>