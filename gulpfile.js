const { src, dest, watch } = require('gulp');
const sass = require('gulp-sass');
const minifyCSS = require('gulp-csso');

function css() {
    return src('resources/sass/app.scss')
        .pipe(sass())
        .pipe(minifyCSS())
        .pipe(dest('public/css'))
}

exports.css = css;
exports.default = function () {
    watch('resources/sass/**/*.scss', css);
}
