<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Models\Service;

Route::get('/', function () {
    return view('home', [
        'services' => Service::all(),
    ]);
})->name('home');

//Zobraženie služby
Route::get('/sluzby/{slug}', [ServiceController::class, 'servicepage'])->name('service.page');

//Stránka kontaktu
Route::get('/kontakt', function () {
    return view('contact');
})->name('kontakt');

Route::post('/sluzby/send', [ContactController::class, 'savemessage'])->name('send.message');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Vylistovanie služieb
    Route::get('/admin/sluzby', [ServiceController::class, 'index'])->name('service.index');

    //Formulár - vytvorenie služby
    Route::get('/admin/sluzby/create-form', function () {return view('admin.service_create_form');})->name('admin.service.create_form');

    //Vytvorenie služby
    Route::post('/admin/sluzby/create', [ServiceController::class, 'create_service'])->name('service.create');

    //Detail služby
    Route::get('/admin/sluby/detail/{id}', [ServiceController::class, 'showdetail'])->name('admin.service-detail');

    //Update služby
    Route::post('/admin/sluzby/update/{id}', [ServiceController::class, 'updateservice'])->name('service.update');

    //Zmazanie služby
    Route::get('/admin/sluzby/delete/{id}', [ServiceController::class, 'deleteservice'])->name('service.delete');    


    //Vylistovanie správ z formulára
    Route::get('/admin/sprvavy', [ContactController::class, 'index'])->name('messages.index');
});

require __DIR__.'/auth.php';
