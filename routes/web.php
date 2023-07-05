<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\transporte\HomeController as TransporteHomeController;
use App\Http\Controllers\transporte\LoginController as TransporteLoginController;
use App\Http\Controllers\transporte\LogoutController as TransporteLogoutController;
use App\Http\Controllers\transporte\RegisterController as TransporteRegisterController;
use App\Http\Controllers\Transporte_HomeController;
use App\Http\Controllers\Transporte_LoginController;
use App\Http\Controllers\Transporte_RegisterController;
use App\Http\Controllers\Almacen_LoginController;
use App\Http\Controllers\Almacen_HomeController;
use App\Http\Controllers\Almacen_RegisterController;
use App\Http\Controllers\Transporte_RepartidorController;

//*********************************** VENTAS **********************************************
Route::get('/register',[RegisterController::class,'show'])->name('register');
Route::post('/register',[RegisterController::class,'register'])->name('register2');
Route::get('/login',[LoginController::class,'show'])->name('ventas.login');
Route::get('/',[HomeController::class,'landing'])->name('landing');
Route::post('/login2',[LoginController::class,'login'])->name('login2');
Route::get('home', [HomeController::class,'index'])->name('home');
Route::get('/logout',[LogoutController::class,'logout'])->name('logout');



/* Categoria */
Route::resource('categoria',CategoriaController::class);

Route::get('cancelar',function(){
    return redirect()->route('categoria.index')->with('datos','Acción Cancelada ..!');
})->name('cancelar');

Route::get('categoria/{id}/confirmar',[CategoriaController::class,'confirmar'])->name('categoria.confirmar');



/* Producto */
Route::resource('producto',ProductoController::class);
Route::get('cancelar1',function(){
    return redirect()->route('producto.index')->with('datos','Acción Cancelada ..!');
})->name('producto.cancelar');
Route::get('producto/{id}/confirmar',[ProductoController::class,'confirmar'])->name('producto.confirmar');


/* Cliente */
Route::resource('cliente',ClienteController::class);
Route::get('cancelar2',function(){
    return redirect()->route('cliente.index')->with('datos','Acción Cancelada ..!');
})->name('cliente.cancelar');
Route::get('cliente/{id}/confirmar',[ClienteController::class,'confirmar'])->name('cliente.confirmar');

/* Mesa */
Route::resource('mesa',MesaController::class);
Route::get('/mesas',[MesaController::class,'mesas'])->name('mesas');
Route::get('cancelar3',function(){
    return redirect()->route('mesa.index')->with('datos','Acción Cancelada ..!');
})->name('mesa.cancelar');
Route::get('/mesalimpiar/{id}',[MesaController::class,'limpiar'])->name('mesa.limpiar');
Route::get('mesa/{id}/confirmar',[MesaController::class,'confirmar'])->name('mesa.confirmar');

/* Pedido */
Route::resource('pedido',PedidoController::class);
Route::get('cancelar4',function(){
    return redirect()->route('pedido.index')->with('datos','Acción Cancelada ..!');
})->name('pedido.cancelar');
Route::get('pedido/{id}/confirmar',[PedidoController::class,'confirmar'])->name('pedido.confirmar');
Route::get('pedido/{id}/create2',[PedidoController::class,'create2'])->name('pedido.create2');
Route::get('pedido/{id}/pago',[PedidoController::class,'editpago'])->name('pedido.pago');

Route::get('pedido/{id}/actualizar',[PedidoController::class,'actualizarpedido'])->name('pedido.actualizar');

Route::put('pedido/store2/{id}',[PedidoController::class,'store2'])->name('pedido.store2');
Route::put('pedido/update2/{id}',[PedidoController::class,'update2'])->name('pedido.update2');

/* Detalle */
 
Route::resource('detalle', DetalleController::class);
Route::get('detalle/lista/{id}',[DetalleController::class,'lista'])->name('detalle.lista');
//Route::post('detalle/store2',[DetalleController::class,'store2'])->name('detalle.store2');
//Route::get('detalle/create2/{id}',[DetalleController::class,'create2'])->name('detalle.create2');



Route::get('cancelar5',function(){
    return redirect()->route('pedido.index')->with('datos','Acción Cancelada ..!');
})->name('detalle.cancelar');
Route::get('pedido/{id}/detalle/confirmar',[DetalleController::class,'confirmar'])->name('detalle.confirmar');
Route::post('cliente/storemodel',[ClienteController::class,'storemodel'])->name('cliente.storemodel');

Route::get('/pdf/{id}',[PDFController::class, 'generatePDF'])->name('pdfdownload');

/*---------------------------TRANSPORTE Y DISTRIBUCION-------------------------*/

Route::get('/registerTr',[Transporte_RegisterController::class,'show'])->name('transporte.register');
Route::post('/registerT',[Transporte_RegisterController::class,'register'])->name('registerT');
Route::get('/loginTr',[Transporte_LoginController::class,'show'])->name('transporte.login');
Route::get('/',[Transporte_HomeController::class,'landing'])->name('landing');
Route::post('/loginT',[Transporte_LoginController::class,'login'])->name('loginT');
Route::get('homeT', [Transporte_HomeController::class,'index'])->name('homeT');
// Route::get('/logout',[TransporteLogoutController::class,'logout'])->name('logout');
//REPARTIDOR
Route::resource('repartidor',Transporte_RepartidorController::class);
Route::get('cancelarR',function(){
    return redirect()->route('repartidor.index')->with('datos','Acción Cancelada ..!');
})->name('repartidor.cancelar');
Route::get('repartidor/{id}/confirmar',[Transporte_RepartidorController::class,'confirmar'])->name('repartidor.confirmar');



//-----------------------------ALMACEN-----------------------------------------
Route::get('/loginAlm',[Almacen_LoginController::class,'show'])->name('almacen.login');
Route::post('/loginA',[Almacen_LoginController::class,'login'])->name('loginA');
Route::get('homeA', [Transporte_HomeController::class,'index'])->name('homeA');
Route::get('/registerAlm',[Almacen_RegisterController::class,'show'])->name('almacen.register');
Route::post('/registerA',[Almacen_RegisterController::class,'register'])->name('registerA');

