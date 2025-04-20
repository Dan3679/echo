const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');

// Paths
const paths = {
    scss: {
        src: 'assets/scss/style.scss',
        dest: './',
        watch: 'assets/scss/**/*.scss'
    },
    js: {
        src: 'assets/js/**/*.js',
        dest: 'assets/js/min',
        outputFile: 'theme.min.js'
    }
};

// Compile and minify SCSS
function compileSass() {
    return src(paths.scss.src)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('.'))
        .pipe(dest(paths.scss.dest));
}

// Minify JS
function minifyJs() {
    return src(paths.js.src)
        .pipe(sourcemaps.init())
        .pipe(concat(paths.js.outputFile))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(dest(paths.js.dest));
}

function watchFiles() {
    watch(paths.scss.watch, compileSass);
    watch(paths.js.src, minifyJs);
}

exports.build = parallel(compileSass, minifyJs);
exports.watch = watchFiles;
exports.default = series(compileSass, minifyJs, watchFiles);
