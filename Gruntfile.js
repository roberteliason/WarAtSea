module.exports = function( grunt ) {
    'use strict';

    // Load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    // Project configuration
    grunt.initConfig( {
        pkg: grunt.file.readJSON( 'package.json' ),

        sass: {
            dist: {
                files: {
                    'web/css/main.css' : 'web/sass/main.scss'
                }
            }
        },

        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'web/css/main.min.css': ['web/css/main.css']
                }
            }
        },

        jshint: {
            options: {
                onecase: false
            },
            all: [ 'web/js/all/main.js' ]
        },

        concat: {
            dist: {
                src: [
                    'web/js/all/main.js',
                    'web/bower_components/jquery/dist/jquery.js'
                ],
                dest: 'web/js/all.js'
            }
        },

        uglify: {
            all: {
                files: {
                    'web/js/all-min.js': ['web/js/all.js']
                },
                options: {
                    mangle: {
                        except: ['jQuery']
                    }
                }
            }
        },

        watch:  {

            scripts: {
                files: ['web/js/all/*.js'],
                tasks: ['concat', 'jshint', 'uglify'],
                options: {
                    debounceDelay: 200
                }
            },

            css: {
                files: ['web/sass/*.scss'],
                tasks: ['sass', 'cssmin']
            },

            livereload: {
                options: { livereload: false },
                files: ['web/css/main.css']
            }

        }

    } );

    // Default task.
    grunt.loadNpmTasks('grunt-contrib-sass');
    // grunt.registerTask( 'default', ['jshint', 'compass', 'uglify', 'concat', 'imagemin', 'watch'] );
    grunt.registerTask( 'default', ['jshint', 'concat', 'watch', 'uglify', 'sass', 'cssmin'] );

    grunt.util.linefeed = '\n';
};