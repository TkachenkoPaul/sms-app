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
    Route::post('/group/subscriber/import', [SubscriberController::class, 'import'])->name('import-subscribers');
    Route::get('/group/subscriber/destroy/{id}', [SubscriberController::class, 'destroy'])->name('destroy-subscriber');
    Route::get('/group/subscriber/edit/{id}', [SubscriberController::class, 'edit'])->name('edit-subscriber');
    Route::put('/group/subscriber/edit/{id}', [SubscriberController::class, 'update'])->name('update-subscriber');

    Route::get('/sources', [SourcesController::class, 'index'])->name('sources');
    Route::post('/sources', [SourcesController::class, 'store'])->name('store-sources');
    Route::get('/sources/edit/{id}', [SourcesController::class, 'edit'])->name('edit-sources');
    Route::put('/sources/edit/{id}', [SourcesController::class, 'update'])->name('update-sources');
    Route::get('/sources/destroy/{id}', [SourcesController::class, 'destroy'])->name('destroy-sources');

    Route::get('/', [MessageController::class, 'index'])->name('messages');
    Route::post('/messages', [MessageController::class, 'store'])->name('store-messages');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth'])->name('dashboard');

    Route::get('/registerss', [Controller::class, 'index']);
});

require __DIR__.'/auth.php';
