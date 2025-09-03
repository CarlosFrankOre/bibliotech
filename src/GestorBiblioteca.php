<?php
namespace Carlos\Bibliotech;

class GestorBiblioteca
{
    private $autores = [];
    private $categorias = [];
    private $editoriales = [];
    private $ejemplares = [];
    private $prestamos = [];
    private $idPrestamoCounter = 1;

    // Métodos para la gestión de Libros (con mensajes)
    public function gestionarAgregarLibro(Libro $libro)
    {
        Libro::agregarLibro($libro);
    }

    public function gestionarEditarLibro($isbn, $nuevosDatos)
    {
        if (Libro::editarLibro($isbn, $nuevosDatos)) {
            echo "Libro con ISBN '{$isbn}' editado exitosamente.<br>";
        } else {
            echo "Error: Libro con ISBN '{$isbn}' no encontrado para editar.<br>";
        }
    }

    public function gestionarEliminarLibro($isbn)
    {
        if (Libro::eliminarLibro($isbn)) {
            echo "Libro con ISBN '{$isbn}' eliminado exitosamente.<br>";
        } else {
            echo "Error: Libro con ISBN '{$isbn}' no encontrado para eliminar.<br>";
        }
    }

    public function buscarLibros($criterio)
    {
        return Libro::buscarLibro($criterio);
    }

    // Métodos para la gestión de Autores
    public function agregarAutor(Autor $autor)
    {
        $this->autores[$autor->getIdAutor()] = $autor;
    }

    public function buscarAutor($criterio)
    {
        $resultados = [];
        foreach ($this->autores as $autor) {
            if (stripos($autor->getNombre(), $criterio) !== false || stripos($autor->getApellido(), $criterio) !== false) {
                $resultados[] = $autor;
            }
        }
        return $resultados;
    }

    // Métodos para la gestión de Categorías
    public function agregarCategoria(Categoria $categoria)
    {
        $this->categorias[$categoria->getIdCategoria()] = $categoria;
    }

    // Métodos para la gestión de Editoriales
    public function agregarEditorial(Editorial $editorial)
    {
        $this->editoriales[$editorial->getIdEditorial()] = $editorial;
    }

    // Métodos para la gestión de Ejemplares
    public function agregarEjemplar(Ejemplar $ejemplar)
    {
        $this->ejemplares[$ejemplar->getIdEjemplar()] = $ejemplar;
    }

    public function getEjemplar($idEjemplar)
    {
        return $this->ejemplares[$idEjemplar] ?? null;
    }

    // Método para contar ejemplares disponibles por libro
    public function countAvailableEjemplaresPorLibro()
    {
        $counts = [];
        foreach ($this->ejemplares as $ejemplar) {
            if ($ejemplar->getEstado() === 'disponible') {
                $isbn = $ejemplar->getLibro()->getIsbn();
                if (!isset($counts[$isbn])) {
                    $counts[$isbn] = 0;
                }
                $counts[$isbn]++;
            }
        }
        return $counts;
    }

    // Nuevos métodos de búsqueda
    public function buscarLibrosPorAutor(Autor $autor)
    {
        $resultados = [];
        $libros = Libro::getLibros();
        foreach ($libros as $libro) {
            foreach ($libro->getAutores() as $libroAutor) {
                if ($libroAutor->getIdAutor() === $autor->getIdAutor()) {
                    $resultados[] = $libro;
                    break;
                }
            }
        }
        return $resultados;
    }

    public function buscarLibrosPorCategoria(Categoria $categoria)
    {
        $resultados = [];
        $libros = Libro::getLibros();
        foreach ($libros as $libro) {
            if ($libro->getCategoria()->getIdCategoria() === $categoria->getIdCategoria()) {
                $resultados[] = $libro;
            }
        }
        return $resultados;
    }

    // Métodos para la gestión de Préstamos
    public function prestarEjemplar($idEjemplar)
    {
        $ejemplar = $this->getEjemplar($idEjemplar);
        if ($ejemplar && $ejemplar->getEstado() === 'disponible') {
            $ejemplar->editarEstado('prestado');
            $prestamo = new Prestamo($this->idPrestamoCounter++, $ejemplar);
            $this->prestamos[$prestamo->getIdPrestamo()] = $prestamo;
            echo "El ejemplar '{$idEjemplar}' ha sido prestado. Estado: {$ejemplar->getEstado()}.<br>";
            return true;
        }
        echo "Error: El ejemplar '{$idEjemplar}' no está disponible para préstamo.<br>";
        return false;
    }

    public function devolverEjemplar($idEjemplar)
    {
        $ejemplar = $this->getEjemplar($idEjemplar);
        if ($ejemplar && $ejemplar->getEstado() === 'prestado') {
            $ejemplar->editarEstado('disponible');
            echo "El ejemplar '{$idEjemplar}' ha sido devuelto. Estado: {$ejemplar->getEstado()}.<br>";
            return true;
        }
        echo "Error: El ejemplar '{$idEjemplar}' no puede ser devuelto (no está prestado).<br>";
        return false;
    }
}