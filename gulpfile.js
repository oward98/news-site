const postcss = require('gulp-postcss');
const rename = require('gulp-rename');
const { src, dest, series, watch } = require('gulp');
const transpiler = require('postcss-preset-env');
const minifier = require('cssnano');
const combiner = require('postcss-import');
const concat = require('gulp-concat');
const header = require('gulp-header');
const dirSync = require('sync-directory');

const extractComponentCSS = () => {
    return (
        src('./theme/Components/**/*.css')
        .pipe(concat('components.css'))
        .pipe(dest('./rawStylesheets/stylesheets'))
    );
}

const extractComponentJS = () => {
    return (
        src('./theme/Components/**/*.js')
        .pipe(concat('components.js'))
        .pipe(dest('./processedStylesheets'))
    );
}

const combineCSS = () => {
    const plugin = [
        combiner()
    ];
    return (
        src('./rawStylesheets/style.css')
        .pipe(postcss(plugin))
        .pipe(rename('1combinedStylesheet.css'))
        .pipe(dest('./processedStylesheets'))
    )
}

const minifyCSS = () => {
    const plugin = [
        minifier()
    ]
    return (
        src('./processedStylesheets/1combinedStylesheet.css')
        .pipe(postcss(plugin))
        .pipe(rename('2minifiedStylesheet.css'))
        .pipe(dest('./processedStylesheets'))
    )
}

const transpileCSS = () => {
    const plugin = [
        transpiler()
    ]
    return (
        src('./processedStyleSheets/2minifiedStylesheet.css')
        .pipe(postcss(plugin))
        .pipe(rename('3transpiledStylesheet.css'))
        .pipe(dest('./processedStylesheets'))
    )
}

const CSSHeader = `/*
    Theme Name: News
    Author: Owen Ward
    Version: 1.0.0
    Description: A custom news site.
    GitHub Theme URI: 
    GitHub Branch: Master
*/`

const addCSSHeader = () => {
    return (
        src('./processedStylesheets/3transpiledStylesheet.css')
        .pipe(header(CSSHeader))
        .pipe(rename('4final.css'))
        .pipe(dest('./processedStylesheets'))
    )
}
/*
const copyCSSToTheme = () => {
    return (
        src('./processedStylesheets/4final.css')
        .pipe(rename('style.css'))
        .pipe(dest('./theme'))
    )
}
*/

const updateEverything = () => {
    //extract css and js for each component, to put into 'components.css'
    watch('./theme/Components/**/*', series(extractComponentCSS, extractComponentJS));
    //general stylesheets might change, force update on master style.css
    watch('./rawStylesheets/stylesheets/*.css', series(combineCSS,  minifyCSS, transpileCSS, addCSSHeader, copyCSSToTheme));
    //all stylesheets end up in this file due to above, so when it changes, begin the final optimisations
    watch('./rawStylesheets/style.css', series(combineCSS, minifyCSS, transpileCSS, addCSSHeader, copyCSSToTheme));
    
    //watch('./**/*', series(() => dirSync('/Users/hannahkhalique-brown/Desktop/SHEN/DEV/bloomsbury/theme', '/Users/hannahkhalique-brown/Sites/BCAAC/wp-content/themes/bloomsburyLink', {
    //    watch: true
    //} )))
    
}

exports.default = updateEverything;