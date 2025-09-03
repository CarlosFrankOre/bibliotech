<?php
namespace Carlos\Bibliotech;
require_once "vendor/autoload.php";
// Instanciar el gestor
$gestor = new GestorBiblioteca();

// 1. Agregar autores (5)
//echo "<h3>AUTORES</h3>";
$autor1 = new Autor(1, 'Gabriel', 'García Márquez', 'Novelista colombiano.', '1927-03-06');
$autor2 = new Autor(2, 'George', 'Orwell', 'Escritor y periodista británico.', '1903-06-25');
$autor3 = new Autor(3, 'J.K.', 'Rowling', 'Escritora británica, autora de la saga Harry Potter.', '1965-07-31');
$autor4 = new Autor(4, 'Stephen', 'King', 'Escritor estadounidense de terror, ficción sobrenatural, misterio, ciencia ficción y fantasía.', '1947-09-21');
$autor5 = new Autor(5, 'Isaac', 'Asimov', 'Escritor y profesor de bioquímica de origen ruso, nacionalizado estadounidense.', '1920-01-02');

$gestor->agregarAutor($autor1);
$gestor->agregarAutor($autor2);
$gestor->agregarAutor($autor3);
$gestor->agregarAutor($autor4);
$gestor->agregarAutor($autor5);

// 2. Agregar categorías (3)
//echo "<h3>CATEGORÍAS</h3>";
$categoria1 = new Categoria(101, 'Ficción', 'Libros de ficción y fantasía.');
$categoria2 = new Categoria(102, 'Ciencia Ficción', 'Libros que exploran la tecnología y el futuro.');
$categoria3 = new Categoria(103, 'Terror', 'Libros diseñados para provocar miedo.');

$gestor->agregarCategoria($categoria1);
$gestor->agregarCategoria($categoria2);
$gestor->agregarCategoria($categoria3);

// 3. Agregar editoriales (3)
//echo "<h3>EDITORIALES</h3>";
$editorial1 = new Editorial(201, 'Editorial Sudamericana', 'Buenos Aires', '555-1234');
$editorial2 = new Editorial(202, 'Salamandra', 'Barcelona', '555-5678');
$editorial3 = new Editorial(203, 'Penguin Random House', 'Ciudad de México', '555-9012');

$gestor->agregarEditorial($editorial1);
$gestor->agregarEditorial($editorial2);
$gestor->agregarEditorial($editorial3);

// 4. Agregar libros (5)
//echo "<h3>LIBROS</h3>";
$libro1 = new Libro('978-0307474448', 'Cien Años de Soledad', 1967, 'Una obra maestra de la literatura latinoamericana.', $editorial1, $categoria1, [$autor1]);
$libro2 = new Libro('978-0451524935', '1984', 1949, 'Novela distópica.', $editorial3, $categoria2, [$autor2]);
$libro3 = new Libro('978-0747532699', 'Harry Potter y la piedra filosofal', 1997, 'El inicio de la famosa saga de fantasía.', $editorial2, $categoria1, [$autor3]);
$libro4 = new Libro('978-0451419200', 'It', 1986, 'Novela de terror icónica.', $editorial3, $categoria3, [$autor4]);
// Libro con 2 autores
$libro5 = new Libro('978-0553294389', 'Yo, Robot', 1950, 'Colección de cuentos de ciencia ficción.', $editorial3, $categoria2, [$autor5, $autor4]);

$gestor->gestionarAgregarLibro($libro1);
$gestor->gestionarAgregarLibro($libro2);
$gestor->gestionarAgregarLibro($libro3);
$gestor->gestionarAgregarLibro($libro4);
$gestor->gestionarAgregarLibro($libro5);

// 5. Agregar ejemplares a cada libro (2 o 3 ejemplares por libro)
//echo "<h3>EJEMPLARES</h3>";
$gestor->agregarEjemplar(new Ejemplar(501, $libro1, 'disponible'));
$gestor->agregarEjemplar(new Ejemplar(502, $libro1, 'disponible'));
$gestor->agregarEjemplar(new Ejemplar(503, $libro1, 'disponible'));

$gestor->agregarEjemplar(new Ejemplar(504, $libro2, 'disponible'));
$gestor->agregarEjemplar(new Ejemplar(505, $libro2, 'disponible'));

$gestor->agregarEjemplar(new Ejemplar(506, $libro3, 'disponible'));

$gestor->agregarEjemplar(new Ejemplar(507, $libro4, 'disponible'));
$gestor->agregarEjemplar(new Ejemplar(508, $libro4, 'disponible'));

$gestor->agregarEjemplar(new Ejemplar(509, $libro5, 'disponible'));
$gestor->agregarEjemplar(new Ejemplar(510, $libro5, 'disponible'));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Biblioteca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-900 text-gray-200 min-h-screen">
<div class="container mx-auto p-6 lg:p-12">

    <!-- Título principal y espacio para imagen -->
    <div class="flex flex-col items-center mb-12">
        <h1 class="text-5xl font-bold text-blue-300 text-center mb-4">Sistema de Gestión de Biblioteca</h1>
        <div class="w-48 h-32 bg-white rounded-lg flex items-center justify-center mb-6 overflow-hidden">
            <!-- Aquí puedes poner una imagen de libros -->
            <img 
                src="https://res.cloudinary.com/ddl6vwk0i/image/upload/v1756870095/libro_gif8af.jpg" 
                alt="Imagen de libros" 
                class="object-contain w-full h-full"
            >
        </div>
    </div>

    <!-- Tarjetas de datos principales -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <!-- Autores -->
        <div class="bg-white text-gray-800 rounded-lg shadow p-4">
            <h2 class="text-xl font-semibold mb-2 text-blue-700">Autores</h2>
            <?php foreach ([$autor1, $autor2, $autor3, $autor4, $autor5] as $autor): ?>
                <div class="mb-1">
                    <span class="font-bold"><?= $autor->getNombre() . ' ' . $autor->getApellido() ?></span>
                    <span class="text-sm text-gray-500">(<?= $autor->getFechaNacimiento() ?>)</span>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Categorías -->
        <div class="bg-blue-50 text-gray-900 rounded-lg shadow p-4">
            <h2 class="text-xl font-semibold mb-2 text-blue-700">Categorías</h2>
            <?php foreach ([$categoria1, $categoria2, $categoria3] as $cat): ?>
                <div class="mb-1">
                    <span class="font-bold"><?= $cat->getNombre() ?></span>
                    <span class="text-sm text-gray-500">(<?= $cat->getDescripcion() ?>)</span>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Editoriales -->
        <div class="bg-yellow-50 text-gray-900 rounded-lg shadow p-4">
            <h2 class="text-xl font-semibold mb-2 text-yellow-700">Editoriales</h2>
            <?php foreach ([$editorial1, $editorial2, $editorial3] as $ed): ?>
                <div class="mb-1">
                    <span class="font-bold"><?= $ed->getNombre() ?></span>
                    <span class="text-sm text-gray-500">(<?= $ed->getDireccion() ?>)</span>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Libros -->
        <div class="bg-green-50 text-gray-900 rounded-lg shadow p-4 col-span-1 md:col-span-2">
            <h2 class="text-xl font-semibold mb-2 text-green-700">Libros</h2>
            <?php foreach ([$libro1, $libro2, $libro3, $libro4, $libro5] as $libro): ?>
                <div class="mb-1">
                    <span class="font-bold"><?= $libro->getTitulo() ?></span>
                    <span class="text-sm text-gray-500">(<?= $libro->getAnioPublicacion() ?>)</span>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Ejemplares -->
        <div class="bg-purple-50 text-gray-900 rounded-lg shadow p-4">
            <h2 class="text-xl font-semibold mb-2 text-purple-700">Ejemplares</h2>
            <?php foreach ([501,502,503,504,505,506,507,508,509,510] as $idEjemplar): ?>
                <?php 
                    $ej = $gestor->getEjemplar($idEjemplar); 
                    $nombreLibro = $ej->getLibro()->getTitulo();
                ?>
                <div class="mb-1">
                    <span class="font-bold">ID: <?= $ej->getIdEjemplar() ?></span>
                    <span class="ml-2 text-blue-700"><?= $nombreLibro ?></span>
                    <span class="text-sm text-gray-500">(<?= $ej->getEstado() ?>)</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Sección: Búsqueda de datos -->
    <section class="mb-12 flex justify-center">
        <div class="w-full md:w-[70%]">
            <h2 class="text-2xl font-bold text-blue-400 mb-4 text-center">Búsqueda de datos</h2>
            <div class="bg-gray-800 rounded-lg p-4 mb-4 text-center">
                <h3 class="font-semibold mb-2">Buscando libro por nombre: 'Harry Potter'</h3>
                <?php
                $resultadosBusqueda = $gestor->buscarLibros('Harry Potter');
                if (!empty($resultadosBusqueda)) {
                    foreach ($resultadosBusqueda as $libro) {
                        echo "Encontrado: {$libro->getTitulo()} (ISBN: {$libro->getIsbn()})<br>";
                    }
                } else {
                    echo "No se encontraron libros.<br>";
                }
                ?>
            </div>
            <div class="bg-gray-800 rounded-lg p-4 mb-4 text-center">
                <h3 class="font-semibold mb-2">Búsqueda de libros por autor (Gabriel García Márquez):</h3>
                <?php
                $librosGGM = $gestor->buscarLibrosPorAutor($autor1);
                if (!empty($librosGGM)) {
                    foreach ($librosGGM as $libro) {
                        echo "Título: {$libro->getTitulo()}<br>";
                    }
                } else {
                    echo "No se encontraron libros para este autor.<br>";
                }
                ?>
            </div>
            <div class="bg-gray-800 rounded-lg p-4 text-center">
                <h3 class="font-semibold mb-2">Búsqueda de libros por categoría (Ciencia Ficción):</h3>
                <?php
                $librosCF = $gestor->buscarLibrosPorCategoria($categoria2);
                if (!empty($librosCF)) {
                    foreach ($librosCF as $libro) {
                        echo "Título: {$libro->getTitulo()}<br>";
                    }
                } else {
                    echo "No se encontraron libros para esta categoría.<br>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Sección: Préstamo de libros -->
    <section class="mb-12 flex justify-center">
        <div class="w-full md:w-[70%]">
            <h2 class="text-2xl font-bold text-green-400 mb-4 text-center">Préstamo de libros</h2>
            <div class="bg-gray-800 rounded-lg p-4 mb-4 text-center">
                <?php
                $gestor->prestarEjemplar(507);
                $gestor->prestarEjemplar(510);
                ?>
                <h3 class="font-semibold mb-2">Verificando estado del ejemplar 507:</h3>
                <?php
                $ejemplar = $gestor->getEjemplar(507);
                echo "Estado actual del ejemplar {$ejemplar->getIdEjemplar()}: {$ejemplar->getEstado()}<br>";
                ?>
                <h3 class="font-semibold mt-4 mb-2">Devolviendo ejemplar 507:</h3>
                <?php
                $gestor->devolverEjemplar(507);
                ?>
            </div>
        </div>
    </section>

    <!-- Sección: Lista actual de libros -->
    <section class="mb-12 flex justify-center">
        <div class="w-full md:w-[80%]">
            <h2 class="text-2xl font-bold text-yellow-400 mb-4 text-center">Lista actual de libros</h2>
            <div class="bg-gray-800 rounded-lg p-4 text-center">
                <?php
                $counts = $gestor->countAvailableEjemplaresPorLibro();
                $libros = Libro::getLibros();
                foreach ($libros as $isbn => $libro) {
                    $count = isset($counts[$isbn]) ? $counts[$isbn] : 0;
                    echo "* {$libro->getTitulo()} (Ejemplares disponibles: {$count}), ISBN: {$libro->getIsbn()}, Autor(es): ";
                    $autores = [];
                    foreach ($libro->getAutores() as $autor) {
                        $autores[] = "{$autor->getNombre()} {$autor->getApellido()}";
                    }
                    echo implode(", ", $autores) . "<br>";
                }
                ?>
            </div>
        </div>
    </section>

</div>
</body>
</html>