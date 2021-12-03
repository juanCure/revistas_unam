<?php

use App\Http\Controllers\AreasConocimientoController;
use App\Http\Controllers\BusquedaPorIndiceController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\EntidadEditoraController;
use App\Http\Controllers\FrecuenciaController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RevistaController;
use App\Http\Controllers\SistemaIndexadorController;
use App\Http\Controllers\SolariumController;
use App\Http\Controllers\SubsistemaController;
use App\Http\Controllers\TemaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [MainController::class, 'index'])->name('inicio');

// Definiendo ruta de recurso la cual sustituye todas las rutas para el Modelo Revista
// Nota importante: Para que funcionará tuve que comentar en el archivo RouteServiceProvider la siguiente línea:
//
//protected $namespace = 'App\\Http\\Controllers';
//
//Route::resource('revistas', RevistaController::class);

/* Definiendo la ruta de recurso para el modelo Editoriales*/

//Route::resource('editoriales', EditorialController::class);

// Ruta para listar las revistas
//Route::get('revistas', [RevistaController::class, 'index'])->name('revistas.index');

// Ruta para crear una revista
//Route::get('revistas/create', [RevistaController::class, 'create'])->name('revistas.create');

// Ruta post para almacenar las revistas en un store
//Route::post('revistas', [RevistaController::class, 'store'])->name('revistas.store');

// Ruta para visualizar un producto
//Route::get('revistas/{revista}', [RevistaController::class, 'show'])->name('revistas.show');

// Ruta para editar un producto
//Route::get('revistas/{revista}/edit', [RevistaController::class, 'edit'])->name('revistas.edit');

//Route::match(['put', 'patch'], 'revistas/{revista}', [RevistaController::class, 'update'])->name('revistas.update');

//Route::delete('revistas/{revista}', [RevistaController::class, 'destroy'])->name('revistas.destroy');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
	'revistas' => RevistaController::class,
	//'areas_conocimiento' => AreasConocimientoController::class,
	//'editoriales' => EditorialController::class,
	//'entidad_editoras' => EntidadEditoraController::class,
	//'idiomas' => IdiomaController::class,
	//'temas' => TemaController::class,
]);

// Ruta para listar las revistas en la vista de gestión
// Route::get('revistas', function () {
// 	return view('revistas.index');
// })->name('revistas.index')->middleware('auth');

// Ruta para mostrar una revista
// Route::get('revistas/{revista}', [RevistaController::class, 'show'])->name('revistas.show');

// Ruta para crear una revista
// Route::get('revistas/create', [RevistaController::class, 'create'])->name('revistas.create');

// Ruta para editar un revista
// Route::get('revistas/{revista}/edit', [RevistaController::class, 'edit'])->name('revistas.edit');

// Ruta para elimianar una revista
// Route::delete('revistas/{revista}', [RevistaController::class, 'destroy'])->name('revistas.destroy');

// Ruta para listar las frecuencias
Route::get('areas_conocimiento', [AreasConocimientoController::class, 'index'])->name('areas_conocimiento.index');

// Ruta para listar las frecuencias
Route::get('frecuencias', [FrecuenciaController::class, 'index'])->name('frecuencias.index');

// Ruta para eliminar una frecuencia
Route::delete('frecuencias/{frecuencia}', [FrecuenciaController::class, 'destroy'])->name('frecuencias.destroy');

// Ruta para listar los subsistemas
Route::get('subsistemas', [SubsistemaController::class, 'index'])->name('subsistemas.index');
Route::get('allSubsistemas', [SubsistemaController::class, 'subsistemas'])->name('subsistemas.all');
// Ruta para listar las entidad_editoras
Route::get('entidad_editoras', [EntidadEditoraController::class, 'index'])->name('entidad_editoras.index');
Route::get('allEntidades', [EntidadEditoraController::class, 'entidades'])->name('entidades.all');

// Ruta para listar las editoriales

Route::get('editoriales', [EditorialController::class, 'index'])->name('editoriales.index');

// Ruta para mostrar la lista de idiomas
Route::get('idiomas', [IdiomaController::class, 'index'])->name('idiomas.index');

// Ruta para mostrar la lista de temas
Route::get('temas', [TemaController::class, 'index'])->name('temas.index');

// Ruta para mostrar la lista de sistemas indexadores
Route::get('indexadores', [SistemaIndexadorController::class, 'index'])->name('indexadores.index');

// Ruta para mostrar la lista de responsables
// Route::get('responsables', [ResponsableController::class, 'index'])->name('responsables.index');
Route::get('/responsables', function () {
	return view('responsables.index');
})->name('responsables.index')->middleware('auth');

// Definiendo las rutas para los Indices de busqueda
// Por tipo de publicación
Route::get('revistasPorTipo', [BusquedaPorIndiceController::class, 'getRevistasPorTipo'])->name('revistas.tipo');

// Por area de conocimiento
Route::get('revistasPorArea', [BusquedaPorIndiceController::class, 'getRevistasPorArea'])->name('revistas.area');

// Por indices
Route::get('revistasPorIndexaciones', [BusquedaPorIndiceController::class, 'getRevistasPorIndexaciones'])->name('revistas.indexaciones');

// Búsqueda por entidad editora
Route::get('revistasPorEntidad', [BusquedaPorIndiceController::class, 'getRevistasPorEntidadEditora'])->name('revistas.entidad');

// Búsqueda por subsistema
Route::get('revistasPorSubsistema', [BusquedaPorIndiceController::class, 'getRevistasPorSubsistema'])->name('revistas.subsistema');

// Ruta para obtener la ficha en una vista modal de cualquier revista
Route::get('verFicha/{id_revista}', [BusquedaPorIndiceController::class, 'viewModal'])->name('verFicha.revista');

// Ruta para obtener el campo indicador de cualquier revista
Route::get('indicador/{id_revista}', [BusquedaPorIndiceController::class, 'getIndicador'])->name('indicador.revista');
// Ruta para obtener las revistas de todos los tipos
//
Route::get('allRevistas', [BusquedaPorIndiceController::class, 'getTodosTiposRevistas'])->name('revistas.all');

// Ruta para obtener las revistas descontinuadas
Route::get('oldRevistas', [BusquedaPorIndiceController::class, 'getRevistasDescontinuadas'])->name('revistas.old');

// Ruta para obtener un listado de revistas de manera más granular
//
Route::get('listado', [BusquedaPorIndiceController::class, 'postListadoRevistas'])->name('revistas.listado');
// Route::post('listado', [BusquedaPorIndiceController::class, 'postListadoRevistas'])->name('revistas.listado');
//
//
// Ruta para obtener los datos que se mostrarán en una gráfica en una vista modal
Route::get('grafica', [BusquedaPorIndiceController::class, 'getTotales'])->name('resultados.grafica');

// Agregando una ruta para probar el ping en SolariumController
Route::get('/ping', [SolariumController::class, 'ping'])->name('solr.ping');

// Busquedas
Route::post('/busqueda', [SolariumController::class, 'search'])->name('solr.basic.search');
Route::get('/busqueda', [SolariumController::class, 'search'])->name('solr.get.basic.search');
Route::post('/avanzada', [SolariumController::class, 'advancedSearching'])->name('solr.advanced.search');
Route::get('/avanzada', [SolariumController::class, 'advancedSearching'])->name('solr.get.advanced.search');