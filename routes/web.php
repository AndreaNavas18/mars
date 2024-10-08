<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Tenderos\TenderoController;
use App\Http\Controllers\Vendedores\VendedorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/login', function () {
        return redirect()->route('/');
    });

    // Ruta para la página de ingreso con token
    Route::get('/token/{token}', function ($token) {
        return redirect()->route('login', ['token' => $token]);
    });

     /**************************************
     * 
     * Rutas para el modulo de tenderos
     */

    Route::get('/saliendo', function () { return view('modules.before-logout'); })->name('saliendo');

    
    Route::get('/terminosycondiciones', [TenderoController::class,'verTerminos'])->name('terminos');
    
    
    Route::post('/aceptar-terminos', [TenderoController::class,'aceptarTerminos'])->name('aceptar.terminos');
    
    
    Route::middleware(['auth'])->group(function () {
        
    /**************************************
     * 
     * Rutas para el modulo de tenderos
     */
    
    Route::get('/marcas', function () { return view('modules.tendero.marcas'); });
    
    Route::get('/premios', function () { return view('modules.tendero.premios'); });
    
    Route::get('/recursos', function () { return view('modules.tendero.recursos'); });
    
    Route::get('/redimir', function () { return view('modules.tendero.redimir'); });

    /**************************************
     * 
     * Rutas para el modulo de administradores
     */
    Route::get('/crear-tenderos', [TenderoController::class, 'create'])->name('create.tenderos');

    Route::post('/crear-tenderos', [TenderoController::class, 'store'])->name('store.tenderos');

    Route::get('/crear-vendedores', [TenderoController::class, 'createVendedor'])->name('create.vendedores');

    Route::post('/crear-vendedores', [TenderoController::class, 'storeVendedor'])->name('store.vendedores');

    Route::get('/administrar-tenderos', [TenderoController::class, 'adminTenderos'])->name('admin.tenderos');

    Route::get('/editar-tendero/{id}', [TenderoController::class, 'edit'])->name('edit.tendero');

    Route::put('/editar-tendero/{id}', [TenderoController::class, 'update'])->name('update.tendero');

    Route::get('/ver-observaciones', [TenderoController::class, 'historialObs'])->name('obs.tenderos');

    Route::get('/listado-observaciones/{id}', [TenderoController::class, 'listObs'])->name('listado.observations');

    Route::post('/importar-tenderos', [ TenderoController::class, 'importTenderos' ])->name('import.tenderos');

    Route::post('/importar-tokens', [ TenderoController::class, 'importTokens' ])->name('import.tokens');

    Route::post('/importar-empleados', [ TenderoController::class, 'importEmpleados' ])->name('import.empleados');

    Route::post('/importar-cumplimiento', [ TenderoController::class, 'importCumplimientos' ])->name('import.cumplimientos');
    
    Route::post('/importar-empleados-update', [ TenderoController::class, 'importEmpleadosUpdate' ])->name('import.empleados.update');

    Route::get('/search-admin-tenderos', [TenderoController::class, 'searchTenderos'])->name('search.admin.tenderos');

    Route::get('/administrar-vendedores', [TenderoController::class, 'adminVendedores'])->name('admin.vendedores');

    Route::get('/editar-vendedor/{id}', [TenderoController::class, 'editVendedor'])->name('edit.vendedor');

    Route::post('/reestablecer-pass-vendedor/{id}', [TenderoController::class, 'reestablecerPassVendedor'])->name('pass.vendedor');

    Route::put('/editar-vendedor/{id}', [TenderoController::class, 'updateVendedor'])->name('update.vendedor');

    Route::get('/search-admin-vendedores', [TenderoController::class, 'searchVendedores'])->name('search.admin.vendedores');

    Route::delete('/vendedor/eliminar/{id}', [ TenderoController::class, 'destroyVendedor' ])->name('destroy.vendedor');


    /**************************************
     * 
     * Rutas para el modulo de vendedores
     */

    Route::get('/crear-observaciones/{id} ', [VendedorController::class, 'create'])->name('create.observations');

    Route::post('/crear-observaciones/{id}', [VendedorController::class, 'store'])->name('store.observations');

    Route::get('/listado-tenderos', [VendedorController::class, 'listTenderos'])->name('listado.tenderos');

    Route::get('/historial-observaciones', [VendedorController::class, 'historialObs'])->name('historial.observations');

    Route::get('/listado-observaciones/{id}', [VendedorController::class, 'listObs'])->name('listado.observations');

    Route::get('/activar-tendero', [VendedorController::class, 'activarVista'])->name('activar.vista.tendero');

    Route::post('/activar-tendero', [VendedorController::class, 'activar'])->name('activar.tendero');

    Route::get('/search-tenderos', [VendedorController::class, 'searchTenderos'])->name('search.tenderos');

    Route::get('/recursos-vendedor', [VendedorController::class, 'recursos'])->name('recursos.vendedor');

    /**************************************
     * 
     * Rutas para generales
     */
    
    Route::post('/change-password', [TenderoController::class, 'cambioContrasena'])->name('change.password');
    
    Route::post('/change-telefono', [TenderoController::class, 'cambioTelefono'])->name('change.telefono');
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');

 });


Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/check-user-role', [LoginController::class, 'checkUserRole'])->name('check-user-role');


/**
 * Rutas para la PWA
 */
Route::get('/offline', [HomeController::class, 'offline'])->name('offline');


// Login Routes...
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);

// // Logout Routes...
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// // Registration Routes...
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

// // Password Reset Routes...
// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// // Password Confirmation Routes...
// Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
// Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

// // Email Verification Routes...
// Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
// Route::post('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

