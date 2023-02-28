<?php

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

use App\Http\Controllers\PacienteController;

Route::get('/', [PacienteController::class, 'index']);

Route::get('/pacientes', [PacienteController::class, 'index']);

Route::get('/cadastropacientes', [PacienteController::class, 'registerPatients']);
Route::post('/save-paciente', [PacienteController::class, 'save']);
Route::get('/delete-paciente/{id}', [PacienteController::class, 'destroy']);
Route::get('/edit-paciente/{id}', [PacienteController::class, 'edit']);
Route::post('/update-paciente', [PacienteController::class, 'update']);


