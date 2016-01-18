var bourbon = require("./index");

module.exports = function(eyeglass, sass) {
  return {
    sassDir: bourbon.includePaths[0]
  };
};

var path = require('path');

module.exports = {
  includePaths: [
    path.join(__dirname, 'app/assets/stylesheets')
  ]
};

var gulp = require("gulp"),
  autoprefix = require("gulp-autoprefixer"),
  sass = require("gulp-sass"),
  connect = require("gulp-connect"),
  bourbon = require("node-bourbon").includePaths;

var paths = {
  scss: "./contrib/*.scss"
};

gulp.task("sass", function () {
  return gulp.src(paths.scss)
    .pipe(sass({
      includePaths: ["styles"].concat(bourbon)
    }))
    .pipe(autoprefix("last 2 versions"))
    .pipe(gulp.dest("./contrib"))
    .pipe(connect.reload());
});

gulp.task("connect", function() {
  connect.server({
    root: "contrib",
    port: 8000,
    livereload: true
  });
});

gulp.task("default", ["sass", "connect"], function() {
  gulp.watch(paths.scss, ["sass"]);
});
