const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
    
// Copiando algunos archivos de tinymce al directorio public    
mix.copyDirectory('node_modules/tinymce/icons', 'public/node_modules/tinymce/icons');
mix.copyDirectory('node_modules/tinymce/plugins', 'public/node_modules/tinymce/plugins');
mix.copyDirectory('node_modules/tinymce/skins', 'public/node_modules/tinymce/skins');
mix.copyDirectory('node_modules/tinymce/themes', 'public/node_modules/tinymce/themes');
// mix.copy('node_modules/tinymce/jquery.tinymce.js', 'public/node_modules/tinymce/jquery.tinymce.js');
mix.copy('node_modules/tinymce/jquery.tinymce.min.js', 'public/node_modules/tinymce/jquery.tinymce.min.js');
// mix.copy('node_modules/tinymce/tinymce.js', 'public/node_modules/tinymce/tinymce.js');
mix.copy('node_modules/tinymce/tinymce.min.js', 'public/node_modules/tinymce/tinymce.min.js');
// Copiar los archivos de Highcharts necesarios desde node_modules a public/js/highcharts/
mix.copy('node_modules/highcharts/highcharts.js', 'public/js/highcharts/highcharts.js')
mix.copy('node_modules/highcharts/highcharts-3d.js', 'public/js/highcharts/highcharts-3d.js')
mix.copy('node_modules/highcharts/modules/exporting.js', 'public/js/highcharts/modules/exporting.js')
mix.copy('node_modules/highcharts/modules/export-data.js', 'public/js/highcharts/modules/export-data.js')
mix.copy('node_modules/highcharts/modules/accessibility.js', 'public/js/highcharts/modules/accessibility.js')
mix.copy('node_modules/highcharts/modules/cylinder.js', 'public/js/highcharts/modules/cylinder.js');