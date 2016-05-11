var gulp = require('gulp');
var connect = require('gulp-connect');
var colors = require('colors');
var watch = require('gulp-watch');
var concat = require('gulp-concat');
var sass = require('gulp-ruby-sass');
var sourcemaps = require('gulp-sourcemaps');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
var fileinclude = require('gulp-file-include');
var gulpIgnore = require('gulp-ignore');
var uglify = require('gulp-uglify');
var bower = require('gulp-bower');

var config = {
     sassPath: './resources/sass',
     bowerDir: './bower_components' 
}

gulp.task('bower', function() { 
    return bower()
         .pipe(gulp.dest(config.bowerDir)) 
});

gulp.task('sass', function() {
  return  gulp.src('./resources/sass/style.scss')
  .pipe(sass({
	loadPath: [
		 './resources/sass',
		  config.bowerDir + '/bootstrap-sass-official/assets/stylesheets'
	 ]
  }))
  .pipe(sourcemaps.write('./', {
    includeContent: false,
    sourceRoot: './resources/sass'
  }))
  .pipe(gulp.dest('./public/css'))
  .pipe(gulpIgnore.exclude(function(file) {
    if (file.path.indexOf('.map') !== -1) {
      return true;
    } else {
      return false;
    }
  }))
  .pipe(minifyCss())
  .pipe(rename({
    extname: '.min.css'
  }))
  .pipe(gulp.dest('./public/css'))
  .on('error', function (err) {
    console.error(err.message);
  })
  .pipe(connect.reload());
});

gulp.task('default', ['sass', 'bower'], function() {
  // Start a server
  connect.server({
    root: '',
    port: 3000,
    livereload: true
  });
  console.log('[CONNECT] Listening on port 3000'.yellow.inverse);
  
  console.log('[CONNECT] Watching SASS files'.blue);
  gulp.watch(config.sassPath + '/**/*.scss', ['sass']); 
});
