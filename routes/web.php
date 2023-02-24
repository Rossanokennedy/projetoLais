<?php

use App\Http\Controllers\FormularioController;
use App\Http\Controllers\ProfileController;
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

Route::get('/formulariomedico', [FormularioController::class, 'formularioMed'])->name('form.formulariomed');
Route::get('/formulariopaciente', [FormularioController::class, 'formularioPac'])->name('form.formulariopac');
Route::post('registerformmed', [FormularioController::class, 'storeMed'])->name('registerformmed');
Route::post('registerformpac', [FormularioController::class, 'storePac'])->name('registerformpac');
Route::get('/formulario', [FormularioController::class, 'show'])->name('show.form');
Route::get('/listarpacientes', [FormularioController::class, 'list'])->name('list.form');

Route::get('/listarusuarios', [ProfileController::class, 'index'])->name('index');
Route::get('/inactive/{id}', [ProfileController::class, 'desativar'])->name('profile.inactive');
Route::get('/active/{id}', [ProfileController::class, 'ativar'])->name('profile.active');

Route::get('/inactiveuser', [ProfileController::class, 'inactive'])->name('inactive');


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', [ProfileController::class, 'dashboard'])->middleware(['active' ,'auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
