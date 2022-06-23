<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->validatePhoneNumber();
    }

    protected function validatePhoneNumber()
    {
        $this->app['validator']->extend('phone', function($attribute, $value)
        {
            // TODO Prepare for international numbers? Currently using Dutch only.
            if(preg_match('^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$^', $value))
                return true;
            else
                return false;
        });
    }
}
