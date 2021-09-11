<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PersonnesController;
use App\Http\Controllers\Back\{
    AdminController,
    UsersController as BackUserController,
    ResourceController as BackResourceController
};

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

Route::get('/', [ 'middleware' => 'auth', 'uses' => 'App\Http\Controllers\PersonnesController@index' ])->name('index');

Route::resource('personnes', PersonnesController::class);
Route::post('search', ['as' => 'recherche', 'uses' => 'PersonnesController@recherche']);


Auth::routes(['verify' => true]);

//Route::get('admin', [ 'middleware' => 'auth', 'uses' => 'App\Http\Controllers\Back\AdminController@index' ]);

Route::prefix('admin')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::name('admin')->get('/', [AdminController::class, 'index']);
        Route::name('purge')->put('purge/{model}', [AdminController::class, 'purge']);
        Route::resource('users', BackUserController::class)->except(['show', 'create', 'store']);
        Route::name('users.indexnew')->get('newusers', [BackResourceController::class, 'create']);
        Route::name('users.indexstore')->post('newusers', [BackResourceController::class, 'store']);
        Route::name('users.indexupdate')->put('newusers/{id}', [BackUserController::class, 'update']);
    });
});
