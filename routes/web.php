<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController; // PagesController

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/darkside', function () {
    return view('admin/index');
})->name('darkside');

Route::get('/darkside/pages', function () {
    return view('admin/pages/pages');
})->name('darkside-pages');

Route::get('/darkside/pages/add', function () {
    return view('admin/pages/add');
})->name('add-page');

Route::post('/darkside/pages/add/new', [PagesController::class, 'add_page'])->name('add-page-request');
