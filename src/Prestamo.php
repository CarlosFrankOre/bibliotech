<?php
namespace Carlos\Bibliotech;
class Prestamo
{
    private $idPrestamo;
    public $ejemplar;
    private $fechaPrestamo;
    private $fechaDevolucion;

    public function __construct($idPrestamo, Ejemplar $ejemplar)
    {
        $this->idPrestamo = $idPrestamo;
        $this->ejemplar = $ejemplar;
        $this->fechaPrestamo = date('Y-m-d H:i:s');
        $this->fechaDevolucion = null;
    }

    public function getIdPrestamo()
    {
        return $this->idPrestamo;
    }

}
?>