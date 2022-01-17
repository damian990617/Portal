// let mix = require('laravel-mix');
//
//
// /* Allow multiple Laravel Mix applications*/
// require('laravel-mix-merge-manifest');
// mix.mergeManifest();
// /*----------------------------------------*/


const mix = require('laravel-mix');
const fs = require('fs');
const path = require('path');

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

const moduleFolder = __dirname + '/vendor/owncms';

const dirs = p => fs.readdirSync(p).filter(f => fs.statSync(path.resolve(p, f)).isDirectory());

let modules = dirs(moduleFolder);

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/scss/app.scss', 'public/css');

// Loop available modules
modules.forEach(function (mod) {
    mix.copyDirectory(moduleFolder + '/' + mod + "/Resources/assets", __dirname + '/public/modules/' + mod);
    mix.js(moduleFolder + '/' + mod + "/Resources/assets/js/mix/*.js", 'modules/' + mod + '/js/' + mod + '.js');
    // mix.css(moduleFolder + '/' + mod + "/Resources/assets/css/app.css", 'modules/' + mod + '.css');
});
