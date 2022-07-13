<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DarksideController; // DarksideController
use App\Http\Controllers\DarksideLogin; // DarksideLogin
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

Route::group(['middleware' => ['auth', 'isadmin']], function(){
    Route::get('/darkside', [DarksideController::class, 'darkside'])->name('darkside');
    Route::get('/darkside/pages', [PagesController::class, 'output_darkside_pages'])->name('darkside-pages');
    Route::get('/darkside/pages/add', [PagesController::class, 'add_page'])->name('add-page');
    Route::get('/darkside/pages/edit/{id}', [PagesController::class, 'edit_page'])->name('edit-page');
    Route::get('/darkside/pages/delete/{id}', [PagesController::class, 'delete_page'])->name('delete-page-request');
    Route::post('/darkside/pages/edit/{id}', [PagesController::class, 'update_page'])->name('update-page-request');
    Route::post('/darkside/pages/add/new', [PagesController::class, 'add_page_request'])->name('add-page-request');
    Route::post('/darkside/pages/output/{id}', [PagesController::class, 'pages_output'])->name('pages-output-request');
});

Route::get('/darkside/login', [DarksideLogin::class, 'darkside_login'])->name('darkside-login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('{any}', [App\Http\Controllers\PagesController::class, 'front_pages']);