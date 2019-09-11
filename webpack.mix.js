const mix  = require('laravel-mix');
const path = require('path');
const fs   = require('fs');

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


// // -- Frontend
// mix.js('resources/js/app.js', 'public/js').extract()
// 	.sass('resources/sass/app.scss', 'public/css')
// 	.extract()
// ;
//
//
// if (mix.inProduction()) {
// 	mix.version();
// }
// // -- -- -- --

// -- Backend
// --scripts
const files = path.join('resources/backend/js', '**/*.js');

mix.js(files, 'public/js/backend.js');

mix.webpackConfig({
	module: {
		rules: [{
			test: /\.js?$/,
			use: [{
				loader: 'babel-loader',
				options: mix.config.babel()
			}]
		}]
	}
});
// -- -- -- --

// -- css
mix.sass('resources/backend/sass/backend.scss', 'public/css/backend.css');
// -- -- -- --
// -- -- -- --
