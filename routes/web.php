<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Models\Service;
use App\Models\Page;

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
    
    //Vylistovanie stránok
    Route::get('/admin/stranky', [PageController::class, 'index'])->name('pages.index');

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


    //Vytvorenie stránky
    Route::get('/admin/pages/create', function () {return view('admin.page-create');})->name('admin.page.create_form');

    Route::get('/admin/pages/sections/text-block', function () {
    return view('sections-forms.txt_blok', [
        'index' => request('index'),
    ]);
    })->name('pages.sections.text_block');

    Route::get('/admin/pages/sections/half-block', function () {
    return view('sections-forms.half_blok', [
        'index' => request('index'),
    ]);
    })->name('pages.sections.hald_block');

    Route::post('/admin/pages/create-page', [PageController::class, 'store'])->name('page.store');


    //Editácia stránky
    Route::get('/admin/pages/{page}/edit', [PageController::class, 'edit'])->name('edit.page');

    Route::post('/admin/pages/update/{page}', [PageController::class, 'update'])->name('update.page');

});

require __DIR__.'/auth.php';


Route::get('/{slug}', [PageController::class, 'showpage'])->name('show.page');