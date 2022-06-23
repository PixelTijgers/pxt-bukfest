/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 // Import the autload view file.
import AutoloadViews from '../common/AutoloadViews';

// Require Boostrap services.
require('./common/bootstrap');

// Load view file.
require('../common/View.js');

// Init Common & load the default functions.
(window['Common'] = require('./common/load.js')).init();

// Auto load views.
AutoloadViews.load('../admin', require.context('../admin/', true, /.(js|vue)$/));
