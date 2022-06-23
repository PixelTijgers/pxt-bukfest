<?php

// Facades.
use Illuminate\Support\Facades\Route;

// Controllers.
// Common controllers.
use App\Http\Controllers\Front\SitemapController;

// Module controllers.
use App\Http\Controllers\Front\Modules\HomeController;
use App\Http\Controllers\Front\Modules\ExpertisesController;
use App\Http\Controllers\Front\Modules\AboutController;
use App\Http\Controllers\Front\Modules\ContactController;
use App\Http\Controllers\Front\Modules\PageController;

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

// Under development route.
Route::get('/under-development', [HomeController::class, 'underDevelopment'])->name('under-development');

// App route group.
Route::middleware(['underDevelopment'])->group(function() {

    // Home route.
    Route::get('/', [HomeController::class, 'index']);

    // About route.
    Route::get('expertises', [ExpertisesController::class, 'index']);
    Route::get('expertises/webdevelopment', [ExpertisesController::class, 'show']);
    Route::get('expertises/grafisch-vormgeving', [ExpertisesController::class, 'show']);
    Route::get('expertises/drukwerk', [ExpertisesController::class, 'show']);
    Route::get('expertises/video-en-animatie', [ExpertisesController::class, 'show']);

    // About route.
    Route::get('over-pixeltijgers', [AboutController::class, 'index']);

    // Contact route.
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact/sendForm', [ContactController::class, 'sendContactForm'])->name('sendForm');

    // Contact route.
    Route::get('disclaimer', [PageController::class, 'index']);
    Route::get('privacybeleid', [PageController::class, 'index']);
    Route::get('cookie-policy', [PageController::class, 'index']);
    Route::get('algemene-voorwaarden', [PageController::class, 'index']);
    Route::get('sitemap', [PageController::class, 'sitemap']);

    // Sitemap route.
    Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
});
