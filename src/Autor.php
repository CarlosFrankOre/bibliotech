<?php
 namespace Carlos\Bibliotech;
 class Autor {
    private $idAutor;
    private $nombre;
    private $apellido;
    private $biografia;
    private $fechaNacimiento;
    // private $libros = [];

    public function __construct($idAutor, $nombre, $apellido, $biografia, $fechaNacimiento) {
        $this->idAutor = $idAutor;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->biografia = $biografia;
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getIdAutor() {
        return $this->idAutor;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }
    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }
    
}
?>