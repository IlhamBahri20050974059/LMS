<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index']);
Route::get('/materi', [App\Http\Controllers\MateriController::class, 'index'])->name('materi');
Route::get('/materi2', [App\Http\Controllers\MateriController::class, 'materi2'])->name('materi2');
Route::get('/materi3', [App\Http\Controllers\MateriController::class, 'materi3'])->name('materi3');
Route::get('/materi4', [App\Http\Controllers\MateriController::class, 'materi4'])->name('materi4');
Route::get('/materi5', [App\Http\Controllers\MateriController::class, 'materi5'])->name('materi5');
Route::get('/materi6', [App\Http\Controllers\MateriController::class, 'materi6'])->name('materi6');
Route::get('/materi7', [App\Http\Controllers\MateriController::class, 'materi7'])->name('materi7');
Route::get('/materi8', [App\Http\Controllers\MateriController::class, 'materi8'])->name('materi8');
Route::get('/pjbl', [App\Http\Controllers\PjblController::class, 'index'])->name('pjbl');
Route::get('/tahap1', [App\Http\Controllers\PjblController::class, 'tahap1'])->name('tahap1');
Route::post('/submit-tahap1', [App\Http\Controllers\PjblController::class, 'submittahap1'])->name('submit.tahap1');
Route::get('/tahap2', [App\Http\Controllers\PjblController::class, 'tahap2'])->name('tahap2');
Route::get('/tahap3', [App\Http\Controllers\PjblController::class, 'tahap3'])->name('tahap3');
Route::get('/tahap4', [App\Http\Controllers\PjblController::class, 'tahap4'])->name('tahap4');
Route::get('/tahap5', [App\Http\Controllers\PjblController::class, 'tahap5'])->name('tahap5');
Route::get('/tahap6', [App\Http\Controllers\PjblController::class, 'tahap6'])->name('tahap6');
Route::get('/kelompok', [App\Http\Controllers\KelompokController::class, 'index'])->name('kelompok');
Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');
Route::get('/pretest', [App\Http\Controllers\TestController::class, 'pretest'])->name('pretest');
Route::post('/submit-answer-pretest', [App\Http\Controllers\TestController::class, 'submitAnswerPretest'])->name('submit.answer.Pretest');
Route::get('/posttest', [App\Http\Controllers\TestController::class, 'posttest'])->name('posttest');
Route::post('/submit-answer-posttest', [App\Http\Controllers\TestController::class, 'submitAnswerPosttest'])->name('submit.answer.Posttest');
Route::post('/submit-tahap2', [App\Http\Controllers\PjblController::class, 'submitTahap2'])->name('submit.tahap2');
Route::post('/submit-tahap3', [App\Http\Controllers\PjblController::class, 'submitTahap3'])->name('submit.tahap3');
Route::post('/submit-tahap4-1', [App\Http\Controllers\PjblController::class, 'submitTahap4ke1'])->name('submit.tahap4-1');
Route::post('/submit-tahap4-2', [App\Http\Controllers\PjblController::class, 'submitTahap4ke2'])->name('submit.tahap4-2');
Route::post('/submit-tahap5', [App\Http\Controllers\PjblController::class, 'submitTahap5'])->name('submit.tahap5');
Route::post('/submit-tahap6', [App\Http\Controllers\PjblController::class, 'submitTahap6'])->name('submit.tahap6');
Route::post('/submit-kelompok', [App\Http\Controllers\KelompokController::class, 'submitKelompok'])->name('submit.kelompok');
Route::get('/download/tahap3/{userId}', [App\Http\Controllers\PjblController::class, 'downloadTahap3'])->name('download.tahap3');
Route::get('/download/tahap4-1/{userId}', [App\Http\Controllers\PjblController::class, 'downloadTahap4ke1'])->name('download.tahap4-1');
Route::get('/download/tahap4-2/{userId}', [App\Http\Controllers\PjblController::class, 'downloadTahap4ke2'])->name('download.tahap4-2');
Route::get('/download/tahap5/{userId}', [App\Http\Controllers\PjblController::class, 'downloadTahap5'])->name('download.tahap5');
Route::get('/profil-siswa', [App\Http\Controllers\ProfilSiswaController::class, 'show'])->name('siswa.profil');
Route::post('/profil-siswa-update', [App\Http\Controllers\ProfilSiswaController::class, 'update'])->name('siswa.profil.update');

Route::get('/guru/pjbl', [App\Http\Controllers\Guru\PjblController::class, 'index'])->name('pjbl');
Route::get('/guru/tahap1', [App\Http\Controllers\Guru\PjblController::class, 'tahap1'])->name('tahap1');
Route::get('/guru/tahap2', [App\Http\Controllers\Guru\PjblController::class, 'tahap2'])->name('tahap2');
Route::get('/guru/tahap3', [App\Http\Controllers\Guru\PjblController::class, 'tahap3'])->name('tahap3');
Route::get('/guru/tahap4', [App\Http\Controllers\Guru\PjblController::class, 'tahap4'])->name('tahap4');
Route::get('/guru/tahap5', [App\Http\Controllers\Guru\PjblController::class, 'tahap5'])->name('tahap5');
Route::get('/guru/tahap1/{id_siswa}', [App\Http\Controllers\Guru\PjblController::class, 'tahap1form'])->name('tahap1.form');
Route::post('/guru/submit-tahap1', [App\Http\Controllers\Guru\PjblController::class, 'submittahap1'])->name('submit.tahap1');
Route::get('/guru/tahap6', [App\Http\Controllers\Guru\PjblController::class, 'tahap6'])->name('tahap6');
Route::get('/guru/tahap6/{id_siswa}', [App\Http\Controllers\Guru\PjblController::class, 'tahap6form'])->name('tahap6.form');
Route::post('/guru/submit-tahap6', [App\Http\Controllers\Guru\PjblController::class, 'submittahap6'])->name('submit.tahap6');