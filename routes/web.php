<?php

use App\Http\Controllers\AboutUs;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SinglePageController;
use App\Livewire\Admin\Layout;
use App\Livewire\Admin\Posts\Create;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('home');
});


Route::get('/o-nama', [AboutUs::class, 'index'])->name('o-nama');

Route::view('/usluge', 'services')->name('services');

// Route::get('/web-design', [SinglePageController::class, 'index'])->name('web.design');
// Route::get('/web-development', [SinglePageController::class, 'index'])->name('web.dev');

Route::view('izrada-web-stranica', 'web-design')->name('web-design');
Route::view('izrada-web-aplikacija', 'web-dev')->name('web-dev');
Route::view('digitalni-marketing', 'social-media')->name('social-media');
Route::view('google-ads', 'google-ads')->name('google-ads');
Route::view('pr-komunikacija', 'pr')->name('pr-komunikacija');
Route::view('foto-video', 'foto-video')->name('foto-video');
Route::view('branding', 'branding')->name('branding');
Route::view('team-building', 'team-building')->name('team-building');
Route::view('b4b', 'b4b')->name('b4b');

// Rute za zaposlenike
Route::view('/team/ramiz-maksumic', 'team.ramiz-maksumic')->name('ramiz-maksumic');
Route::view('/team/maher-al-osta', 'team.maher-al-osta')->name('maher-al-osta');
Route::view('/team/irma-kajan', 'team.irma-kajan')->name('irma-kajan');


Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/single/{project:slug}/', [PortfolioController::class, 'portfolioSingle'])->name('single-portfolio');

// Route::get('/cjenovnik', [PriceController::class, 'index'])->name('price');

Route::get('/kontakt', [ContactController::class, 'index'])->name('contact');

Route::get('/novosti', [PostController::class, 'index'])->name('post');
// Route::get('/novosti/single', [PostController::class, 'singlePost'])->name('single-post');
Route::get('/novosti/{post:slug}', [PostController::class, 'singlePost'])->name('single-post');

Route::post('send-order', [ContactController::class, 'send'])->name('send.order');

Route::get('/digitalni-savjetnik', function () {
    return view('pages.digitalni-savjetnik');
})->name('digitalni-savjetnik');

Route::get('/projects/{project}/documentation', [\App\Http\Controllers\ProjectDocumentationController::class, 'show'])
    ->name('projects.documentation');


Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/', \App\Livewire\Admin\Layout::class)
            ->name('admin');

        Route::get('/posts/create', Create::class)
            ->name('admin.posts.create');

        // Route::get('/posts/edit/{post}', Edit::class)
        //     ->name('admin.posts.edit');
    });

require __DIR__ . '/auth.php';
