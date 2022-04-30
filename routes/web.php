<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Auth\RegisterController;

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

Auth::routes();


//RUTA INDEX

Route::get('/', function () {
    return view('home');

});






Route::group(['middleware' => 'auth'], function () {

//RUTAS ADMIN O PRINCIPALES

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//RUTAS ROLES

Route::resource('/roles', App\Http\Controllers\RolesController::class);
Route::post('/roles', [App\Http\Controllers\RolesController::class, 'guardar' ])->name('Roles_guardar');
Route::put('/roles{role}', [App\Http\Controllers\RolesController::class, 'editar' ])->name('Roles_editar');



//RUTAS SERVICIOS

Route::resource('/servicios', App\Http\Controllers\ServicioController::class);
Route::post('/servicios', [App\Http\Controllers\ServicioController::class, 'servicio_guardar' ])->name('guardar_Servicio');
Route::post('/servicios{servicio}', [App\Http\Controllers\ServicioController::class, 'editar_servicio' ])->name('Servicio_editar');
Route::put('/servicios', [App\Http\Controllers\ServicioController::class, 'update_status' ])->name('Editar_estado_servicio');



//RUTAS CLIENTES

Route::resource('/clientes', App\Http\Controllers\ClienteController::class);
Route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'cliente_guardar'])->name('ClienteGuardar');
Route::put('/clientes{cliente}', [App\Http\Controllers\ClienteController::class , 'Editar_cliente'])->name('editar_cliente');
Route::put('/clientes', [App\Http\Controllers\ClienteController::class , 'update_status'])->name('Editar_estado_cliente');



//RUTAS PROVEEDORES

Route::resource('/proveedores', App\Http\Controllers\ProveedoreController::class);
Route::post('/proveedores', [App\Http\Controllers\ProveedoreController::class, 'guardar_proveedor'])->name('Proveedores_guardar');
Route::put('/proveedores{proveedore}', [App\Http\Controllers\ProveedoreController::class, 'editar_proveedor' ])->name('editar');
Route::put('/proveedores', [App\Http\Controllers\ProveedoreController::class, 'update_status'])->name('Editar_estado_proveedor');




//RUTAS USUARIOS

Route::put('/usuarios{usuario}', [App\Http\Controllers\UsuarioController::class , 'editar_usuario'])->name('Editar_usuario');
Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);
Route::put('/usuarios', [App\Http\Controllers\UsuarioController::class, 'update_status'] )->name('Editar_estado_usuario');




//RUTAS PRODUCTOS

Route::resource('/productos', App\Http\Controllers\ProductoController::class);
Route::post('/productos', [App\Http\Controllers\ProductoController::class, 'guardar'])->name('ProductoGuardar');
Route::put('/productos{producto}', [App\Http\Controllers\ProductoController::class, 'editar'])->name('ProductoEditar');
Route::put('/productos', [App\Http\Controllers\ProductoController::class, 'update_status'])->name('Editar_estado');



//RUTAS COMPRAS

Route::resource('/compras', App\Http\Controllers\ComprasController::class);
Route::put('/compras/Agregar_compra', [App\Http\Controllers\ComprasController::class, 'show'])->name('Agregar_compra');
Route::post('/compras/Agregar_compra', [App\Http\Controllers\ComprasController::class, 'Agregar_producto_compra'])->name('Agregar_producto_compra');
Route::post('/compras', [App\Http\Controllers\ComprasController::class, 'Agregar_compra'])->name('Guardar_compra');
Route::post('/compras/detalles', [App\Http\Controllers\ComprasController::class, 'detalle'])->name('Detalles');
Route::post('/', [App\Http\Controllers\ComprasController::class, 'exportar_excel'])->name('Exportar_Excel');





//RUTAS VENTAS

Route::resource('/ventas', App\Http\Controllers\VentasController::class);
Route::post('/ventas/Agregar_ventas', [App\Http\Controllers\VentasController::class, 'Agregar_venta'])->name('Agregar_venta');
Route::post('/ventas', [App\Http\Controllers\VentasController::class, 'Guardar_venta'])->name('Guardar_Venta');
Route::post('ventas.Agregar_ventas', [App\Http\Controllers\VentasController::class, 'Buscar_cliente'])->name('Buscar_clientes');
Route::post('/ventas/Detalles_ventas', [App\Http\Controllers\VentasController::class, 'Detalles'])->name('Detalles_ventas');



//RUTAS INFORMES

Route::resource('/informes', App\Http\Controllers\InformeController::class);
Route::post('/informes/informe_ventas', [App\Http\Controllers\InformeController::class, 'informe_ventas'])->name('Informe_ventas');
Route::post('/informes/informe_compras', [App\Http\Controllers\InformeController::class, 'informe_compras'])->name('Informe_compras');


//USER
Route::post('/usuarios', [App\Http\Controllers\Auth\RegisterController::class, 'usuario_guardar'] )->name('guardar_usuario');

Route::resource('/permissions', controller: App\Http\Controllers\PermissionController::class);



});




