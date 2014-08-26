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
                    'res/css/forms.css',
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
                        dest: 'res/css/',
                        ext: '.css'
                    }
                ]
            }
        },

        // Disabled by default
        // coffee: {
        //     dev: {
        //         files: [
        //             {
        //                 expand: true,
        //                 cwd: 'res/coffee',
        //                 src: ['*.coffee'],
        //                 dest: 'res/js/',
        //                 ext: '.js'
        //             }
        //         ]
        //     }
        // },

        // Contains tasks to run when grunt watch is invoked. Whenever any of the files specified are modified, executes tasks specified.
        watch: {
            less: {
                files: 'res/less/*.less',
                tasks: 'less:dev'
            }
        }
    });

    // Load plugins. Run npm install in the theme root to install these according to package.json
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Default task - executes when you run grunt in the theme root.
    grunt.registerTask('default', ['less:dev', 'uglify', 'cssmin']);
};
