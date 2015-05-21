/*global module:false*/
module.exports = function(grunt) {
    // Project configuration
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // JavaScript Minifier. Add your files to be minified in the src array.
        uglify: {
            build: {
                src: [
                    'res/js/bootstrap.js',
                    'res/js/fitvids.js',
                    'res/js/retina.js',
                    'res/js/google.fastbutton.js',
                    'res/js/jquery.google.fastbutton.js',
                    'res/js/global.js'
                ],
                dest: 'res/build/global.min.js'
            }
        },
        // CSS Minifier. Add your files to be minified in the src array.
        cssmin: {
            build: {
                src: [
                    'res/css/bootstrap.css',
                    'res/css/font-awesome.css',
                    'res/css/typography.css',
                    'res/css/layout.css'
                ],
                dest: 'res/build/global.min.css'
            }
        },
        /* Compiles LESS files in res/less. Uses grunt's glob expansion to get everything in the dir.
         * You won't need to update this when you add a new file. */
        less: {
            boot: {
                    files: [
                    {
                        expand: true,
                        cwd: 'res/bootstrap/',
                        src: ['bootstrap.less'],
                        dest: 'res/css/',
                        ext: '.css'
                    }
                ]
            },
            dev: {
                files: [
                    {
                        expand: true,
                        cwd: 'res/less/',
                        src: ['*.less'],
                        dest: 'res/.tmp/css/',
                        ext: '.css'
                    }
                ]
            }
        },

        // Add vendor prefixed styles
        autoprefixer: {
            options: {
                browsers: ['last 2 versions'],
            },
            dev: {
                files: [
                    {
                        expand: true,
                        cwd: 'res/.tmp/css/',
                        src: ['typography.css', 'layout.css'],
                        dest: 'res/css/',
                        ext: '.css'
                    }
                ]
            }
        },

        // Contains tasks to run when grunt watch is invoked. Whenever any of the files specified are modified, executes tasks specified.
        watch: {
            less: {
                files: 'res/less/**/*.less',
                tasks: 'less:dev'
            },
            autoprefixer: {
                files: 'res/.tmp/css/*.css',
                tasks: 'autoprefixer:dev'
            }
        }
    });

    // Load plugins. Run npm install in the theme root to install these according to package.json
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task - executes when you run grunt in the theme root.
    grunt.registerTask('default', ['less:dev', 'autoprefixer:dev', 'uglify', 'cssmin']);
};
