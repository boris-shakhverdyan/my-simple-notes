<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', "HomeController@index")->name("home")->middleware("verified");

Auth::routes(["verify" => true]);

Route::get('/home', 'HomeController@index')->name('home-alt')->middleware("verified");

Route::get("/create", "HomeController@create")->name("create")->middleware("verified");
Route::get("/edit/{id}", "HomeController@edit")->name("edit")->middleware("verified");
Route::get("/trash", "HomeController@trash")->name("trash")->middleware("verified");

Route::get("/note/restore/{id}", "NotesController@restore")->name("note-restore")->middleware("verified");

Route::post("/note/create", "NotesController@create")->name("note-create")->middleware("verified");
Route::post("/note/edit/{id}", "NotesController@edit")->name("note-edit")->middleware("verified");
Route::post("/note/to-trash/{id}", "NotesController@trash")->name("note-trash")->middleware("verified");
Route::post("/note/delete/{id}", "NotesController@delete")->name("note-delete")->middleware("verified");
Route::post("/note/restore/{id}", "NotesController@restore")->name("note-restore")->middleware("verified");
