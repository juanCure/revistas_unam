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
// Copiando el directorio fonts
mix.copyDirectory('resources/fonts', 'public/fonts')
.copy('resources/js/allJournals.js', 'public/js')
.copy('resources/js/chartData.js', 'public/js')
.copy('resources/js/main.js', 'public/js')
.copy('resources/js/results_article.js', 'public/js')
.copy('resources/js/results_journal.js', 'public/js')
.copy('resources/js/sheetjs.min.js', 'public/js')
.copy('resources/js/bootstrap.js', 'public/js')
.copy('resources/js/jquery.min.js', 'public/js')
.copyDirectory('resources/js/chartThemes', 'public/js/chartThemes');
// Copiando las hojas de estilo
mix.copy('resources/css/Contact-Form-Clean.css','public/css/Contact-Form-Clean.css')
.copy('resources/css/article_view.css','public/css/article_view.css')
.copy('resources/css/create-revista.css','public/css/create-revista.css')
.copy('resources/css/footer.css','public/css/footer.css')
.copy('resources/css/interiores.css','public/css/interiores.css')
.copy('resources/css/journal_view.css','public/css/journal_view.css')
.copy('resources/css/jumbotron.css','public/css/jumbotron.css')
.copy('resources/css/main.css','public/css/main.css')
.copy('resources/css/style-results-table.css','public/css/style-results-table.css');

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