<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::loginView(fn () => view('admin.auth.login'));
        Fortify::requestPasswordResetLinkView(fn () => view('admin.auth.forgot-password'));
        Fortify::resetPasswordView(fn () => view('admin.auth.reset-password'));
    }
}
