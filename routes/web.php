<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\GroupsController;
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



Route::middleware(['auth'])->group(function () {

    Route::get('/groups', [GroupsController::class, 'index'])->name('groups');
    Route::get('/groups/{id}/edit', [GroupsController::class, 'edit'])->name('edit-group');
    Route::get('/groups/{id}/destroy', [GroupsController::class, 'destroy'])->name('destroy-group');
    Route::post('/groups', [GroupsController::class, 'store'])->name('add-group');
    Route::get('/groups/${id}', [GroupsController::class, 'index'])->name('groupSubscribers');

    Route::get('/', function () {
    // return view('welcome');
        return view('statistics');
    })->name('main');
    Route::get('/mailing-list', function () {
        return view('mailing-list');
    })->name('mailing-list');
    Route::get('/sources', function () {
        return view('sources');
    })->name('sources');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');


    Route::get('/registerss', [Controller::class, 'index']);
});




// Route::get('/', function () {
//     // return view('welcome');
//     return view('test');
// })->middleware(['auth'])->name('main');
Route::get('/login2', function () {
    // return view('welcome');
    return view('login2');
});
Route::get('/register2', function () {
    // return view('welcome');
    return view('register2');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
