const mix = require('laravel-mix');

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

mix.js(['resources/js/layouts/master.js',
    'resources/js/layouts/header.js',
    'resources/js/layouts/footer.js',
    'resources/js/pages/home.js',
    'resources/js/pages/about.js',
    'resources/js/pages/publications/read.js',
    'resources/js/pages/projects.js',
    'resources/js/pages/services.js',
  ], 'public/js/app.js')
  .js(['resources/js/admin/layouts/master.js',
    'resources/js/admin/layouts/header.js',
    'resources/js/admin/layouts/footer.js',
    'resources/js/admin/pages/home.js',
    'resources/js/admin/pages/publications/create.js',
    'resources/js/admin/pages/projects/index.js',
    'resources/js/admin/pages/projects/create.js',
    'resources/js/admin/pages/projects/edit.js',
    'resources/js/admin/pages/products/create.js',
    'resources/js/admin/pages/products/edit.js',
  ], 'public/js/admin.js')

.styles(['resources/css/layouts/master.css',
    'resources/css/layouts/header.css',
    'resources/css/layouts/footer.css',
    'resources/css/components/products-card.css',
    'resources/css/components/project.css',
    'resources/css/components/publication.css',
    'resources/css/components/pagination.css',
    'resources/css/pages/home.css',
    'resources/css/pages/about.css',
    'resources/css/pages/publications/index.css',
    'resources/css/pages/publications/read.css',
    'resources/css/pages/projects.css',
    'resources/css/pages/services.css',
    'resources/css/pages/products/read.css',
    'resources/css/pages/its.css',
  ], 'public/css/app.css')
  .styles(['resources/css/admin/layouts/master.css',
    'resources/css/admin/layouts/header.css',
    'resources/css/admin/layouts/footer.css',
    'resources/css/admin/pages/home.css',
    'resources/css/admin/pages/publications/create.css',
    'resources/css/admin/pages/products/create.css',
  ], 'public/css/admin.css')

.version();