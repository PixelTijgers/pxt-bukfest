<?php

// Facades.
use Illuminate\Support\Facades\Route;

// Controllers.
use App\Http\Controllers\Admin\Modules\AdministratorController;
use App\Http\Controllers\Admin\Modules\BoardController;
use App\Http\Controllers\Admin\Modules\CalendarController;
use App\Http\Controllers\Admin\Modules\CategoryController;
use App\Http\Controllers\Admin\Modules\ClientController;
use App\Http\Controllers\Admin\Modules\DashboardController;
use App\Http\Controllers\Admin\Modules\DetailController;
use App\Http\Controllers\Admin\Modules\InvoiceController;
use App\Http\Controllers\Admin\Modules\MemberController;
use App\Http\Controllers\Admin\Modules\MembershipController;
use App\Http\Controllers\Admin\Modules\PageController;
use App\Http\Controllers\Admin\Modules\PostController;
use App\Http\Controllers\Admin\Modules\SocialController;
use App\Http\Controllers\Admin\Modules\SponsorController;
use App\Http\Controllers\Admin\Modules\TeamController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Redirect the routes if the users accidentally go to a wrong url.
Route::redirect('/admin', '/admin/login');
Route::redirect('/login', '/admin/login');
Route::redirect('/login/admin', '/admin/login');

// Route group: Admin.
Route::middleware(['auth:sanctum', 'verified', 'admin.permission'])->prefix('admin')->group(function () {

    // Change the language of the admin.
    Route::get('/change-language/{language}', ['as' => 'change.language', 'uses' => 'App\Http\Controllers\Admin\AdminController@changeAdminLanguage']);

    // Route group: Admin.
    Route::prefix('modules')->group(function () {

        // Init dashboard route(s).
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Init pages.
        Route::resource('pages', PageController::class, ['names' => 'page'])->except(['show']);
        Route::post('pages/updateSortable', [PageController::class, 'updateSortable']);

        // Init posts.
        Route::resource('posts', PostController::class, ['names' => 'post']);

        // Init categories  route(s).
        Route::resource('categories', CategoryController::class, ['names' => 'category']);

        // Init calendar route(s).
        Route::resource('calendar', CalendarController::class, ['names' => 'calendar']);

        // Init social media route(s).
        Route::resource('socials', SocialController::class, ['names' => 'social']);
        Route::post('socials/updateSortable', [SocialController::class, 'updateSortable']);

        // Init sponsor route(s).
        Route::resource('sponsors', SponsorController::class, ['names' => 'sponsor']);
        Route::post('sponsors/updateSortable', [SponsorController::class, 'updateSortable']);

        // Init board route(s).
        Route::resource('board', BoardController::class, ['names' => 'board']);

        // Init team route(s).
        Route::resource('teams', TeamController::class, ['names' => 'team']);

        // Init membership route(s).
        Route::resource('memberships', MembershipController::class, ['names' => 'membership']);

        // Init member route(s).
        Route::resource('members', MemberController::class, ['names' => 'member'])->except(['show']);
        Route::get('members/download/{contribution}/{member}', ['as' => 'contribution.download', 'uses' => 'App\Http\Controllers\Admin\Modules\MemberController@downloadContribution']);
        Route::get('members/export',[MemberController::class, 'export'])->name('member.export');

        // Init details route(s).
        Route::resource('details', DetailController::class, ['names' => 'detail'])->except(['index', 'create', 'show', 'destroy']);

        // Init client route(s).
        Route::resource('clients', ClientController::class, ['names' => 'client']);

        // Init invoice route(s).
        Route::resource('invoices', InvoiceController::class, ['names' => 'invoice']);
        Route::get('invoices/download/{invoice}', ['as' => 'invoice.download', 'uses' => 'App\Http\Controllers\Admin\Modules\InvoiceController@downloadInvoice']);

        // Init administrators route(s).
        Route::resource('administrators', AdministratorController::class, ['names' => 'administrator']);

    });

});
