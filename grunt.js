/*global module:false*/
module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    meta: {
      version: '0.1.0'
    },
    // Minify JS w/ uglify.js
    min: {
      build: {
        src: ['res/js/global.js', 'res/js/fitvids.min.js', 'res/js/flexslider.min.js', 'res/js/ios-bug.js'],
        dest: 'res/build/global.min.js'
      }
    },
    // YUI Compress CSS
    cssmin: {
      build: {
        src: [
              'res/css/bootstrap.css',
              'res/css/plugins.css',
              'res/css/font-awesome.css',
              'res/css/typography.css',
              'res/css/layout.css'
        ],
        dest: 'res/build/global.min.css'
      }
    },
    // Compiles LESS into CSS
    less: {
      dev: {
        files: {
          'res/css/*.css' : 'res/less/*.less'
        }
      }
    },
    // Everything that needs to run on grunt watch goes here
    watch: {
      less: {
        files: 'res/less/*.less',
        tasks: 'less'
      }
    }
  });
  
  // Load 3rd party plugins
  // If script fails on build because of missing modules, run npm install [task-name] in theme root
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-css');

  // Default task, will run if no task name is passed.
  // This will build our project for stage/prod deploy.
  grunt.registerTask('default', 'less min cssmin');
};