<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnesController;

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

Route::get('/', [PersonnesController::class, 'index'])->name('index');

Route::resource('personnes', PersonnesController::class);
Route::post('search', ['as' => 'recherche', 'uses' => 'PersonnesController@recherche']);

