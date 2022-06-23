const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const ResourceMix = require('./resources/js/common/ResourceMix.js');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

    mix
    .js('resources/js/front/front.js', 'public/js/front/front.js')
    .sass('resources/scss/front/front.scss', 'public/css/front/front.css')
    .js('resources/js/admin/admin.js', 'public/js/admin/admin.js')
    .sass('resources/scss/admin/admin.scss', 'public/css/admin/admin.css')
    // Do not process CSS urls.
    .options({
        postCss: [ tailwindcss('./tailwind.config.js') ],
        processCssUrls: false,
    })
    .version();

    // Copies node_modules/<dir> files to public/vendor/<dir>. Uses this for already compiled dists in node_modules.
    ResourceMix
        .init(mix)
        .nodeModuleDists([
            // Scripts
            '@fortawesome/fontawesome-pro/js/all.min.js',
            '@popperjs/core/dist/umd/popper.js',
            'apexcharts/dist/apexcharts.min.js',
            'bootstrap/dist/js/bootstrap.bundle.min.js',
            'bootstrap-maxlength/dist/bootstrap-maxlength.min.js',
            'datatables.net/js/jquery.dataTables.min.js',
            'datatables.net-bs4/js/dataTables.bootstrap4.min.js',
            'dropify/dist/js/dropify.min.js',
            'jquery/dist/jquery.min.js',
            'jquery-slugify/dist/slugify.min.js',
            'jquery-sortable-lists/jquery-sortable-lists.js',
            'jquery-sticky/jquery.sticky.js',
            'jquery-tags-input/dist/jquery.tagsinput.min.js',
            'jquery-ui-dist/jquery-ui.min.js',
            'mburger-css/dist/mburger.js',
            'mmenu-js/dist/mmenu.js',
            'mmenu-light/dist/mmenu-light.js',
            'mmenu-light/dist/mmenu-light.polyfills.js',
            'perfect-scrollbar/dist/perfect-scrollbar.min.js',
            'select2/dist/js/select2.full.min.js',
            'slick-slider/slick/slick.min.js',
            'speakingurl/lib/speakingurl.js',
            'sweetalert2/dist/sweetalert2.all.min.js',
            'summernote/dist/summernote-bs5.min.js',
            'tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js',
            'toastr/build/toastr.min.js',

            // Styles
            '@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css',
            'apexcharts/dist/apexcharts.css',
            'bootstrap/dist/css/bootstrap.min.css',
            'datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            'dropify/dist/css/dropify.min.css',
            'flag-icons/css/flag-icons.min.css',
            'jquery-tags-input/dist/jquery.tagsinput.min.css',
            'jquery-ui-dist/jquery-ui.min.css',
            'mburger-css/dist/mburger.css',
            'mmenu-js/dist/mmenu.css',
            'mmenu-light/dist/mmenu-light.css',
            'perfect-scrollbar/css/perfect-scrollbar.css',
            'select2/dist/css/select2.min.css',
            'slick-slider/slick/slick.css',
            'slick-slider/slick/slick-theme.css',
            'sweetalert2/dist/sweetalert2.min.css',
            'summernote/dist/summernote-bs5.min.css',
            'tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css',
            'toastr/build/toastr.min.css'
        ]);
