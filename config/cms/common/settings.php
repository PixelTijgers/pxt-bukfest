<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Settings
    |--------------------------------------------------------------------------
    |
    | These values are used throughout the application. Change these settings
    | as you desire. Feel free to add your own settings too!
    |
    */

    // Is app an intranet app?
    'is_intranet' => false,

    // Is app under development?
    'under_development' => true,

    // Supported languages (for ML use.)
    'app_locales' => [
        'nl' => 'nl',
        'en' => 'gb',
    ],

    // I.P. adresses that are whitelisted.
    'developers_ip' => [
        '127.0.0.1', // Localhost,
        '84.84.78.91', // Michiel's IP
    ],

    // Default <head> settings.
    'head' => [
        'meta_title' => 'Lorem ipsum dolor sit amet',
        'meta_description' => 'Suspendisse commodo, libero sed viverra mattis, ex nisi faucibus augue, in auctor tellus leo vel neque.',
        'meta_tags' => 'Tag 1, Tag 2, Tag 3, Tag 4',
        'og_type' => 'website',
        'og_locale' => 'nl_NL',
    ],

    /*
     * Set the Mburger animation.
     * Available classes:
     * mburger-- collapse
     * mburger--spin
     * mburger--squeeze
     * mburger--tornado
     */
    'mburger' => 'mburger--spin',

    // Filename of the logo
    'logo' => 'pixeltijgers_logo.svg',

    // Default contact form mail.
    'email' => 'info@pixeltijgers.nl',
];
