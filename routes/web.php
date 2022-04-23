<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SourcesController;
use App\Http\Controllers\SubscriberController;
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
    Route::get('/group/edit/{id}', [GroupsController::class, 'edit'])->name('edit-group');
    Route::put('/group/edit/{id}', [GroupsController::class, 'update'])->name('update-group');
    Route::get('/group/destroy/{id}', [GroupsController::class, 'destroy'])->name('destroy-group');
    Route::post('/groups', [GroupsController::class, 'store'])->name('add-group');

    Route::get('/group/subscribers/{groupId}', [SubscriberController::class, 'index'])->name('subscribers');
    Route::post('/group/subscriber', [SubscriberController::class, 'store'])->name('add-subscriber');
    Route::get('/group/subscriber/destroy/{id}', [SubscriberController::class, 'destroy'])->name('destroy-subscriber');
    Route::get('/group/subscriber/edit/{id}', [SubscriberController::class, 'edit'])->name('edit-subscriber');
    Route::put('/group/subscriber/edit/{id}', [SubscriberController::class, 'update'])->name('update-subscriber');

    Route::get('/sources',[SourcesController::class,'index'])->name('sources');
    Route::post('/sources',[SourcesController::class,'store'])->name('store-sources');
    Route::get('/sources/edit/{id}',[SourcesController::class,'edit'])->name('edit-sources');
    Route::put('/sources/edit/{id}',[SourcesController::class,'update'])->name('update-sources');
    Route::get('/sources/destroy/{id}',[SourcesController::class,'destroy'])->name('destroy-sources');

    Route::get('/messages',[MessageController::class,'index'])->name('messages');

    Route::get('/', function () {
    // return view('welcome');
        return view('statistics');
    })->name('main');


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
