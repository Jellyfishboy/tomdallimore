'user strict';
module.exports = function (grunt) {
    require('load-grunt-tasks')(grunt, {config: 'package.json'});
    require('time-grunt')(grunt);

    grunt.initConfig({
        watch: {
            coffee: {
                files: ['assets/src/coffee/{,*/}*.coffee'],
                tasks: ['coffee:server']
            },
            options: {
                nospawn: true
            },
            compass: {
                files: ['assets/src/sass/{,*/}*.{scss,sass}'],
                tasks: ['compass:server']
            },
        },
        compass: {
            options: {
                sassDir: 'assets/src/sass',
                cssDir: 'assets/css',
                imagesDir: 'assets/img',
                httpGeneratedImagesPath: '/wp-content/themes/tomdallimore/assets/img'
            },
            dist: {
                outputStyle: 'compressed'
            },
            server: {
                options: {
                    debugInfo: true,
                    outputStyle: 'nested'
                }
            }
        },
        coffee: {
            options: {
                sourceMap: false,
                sourceRoot: ''
            },
            dist: {},
            server: {
                files: [{
                    expand: true,
                    cwd: 'assets/src/coffee',
                    src: '{,*/}*.coffee',
                    dest: 'assets/js',
                    ext: '.js'
                }]
            }
        },
        concurrent: {
            server: [
                'coffee:server',
                'compass:server'
            ],
            dist: [
                'coffee:server',
                'compass:dist'
            ]
        },
        clean: {
            dist: {
                files: [{
                    dot: true,
                    src: [
                        'assets/css/application.css',
                        'assets/js/application.js'
                    ]
                }]
            }
        },
        uglify: {
            options: {
              mangle: true
            },
            dist: {
                files: {
                    'assets/js/application.js': [
                        'assets/js/application.js'
                    ]
                }
            }
        }
    });
    grunt.registerTask('development', [
        'concurrent:server',
        'watch'
    ]);
    grunt.registerTask('production', [
        'clean:dist',
        'concurrent:server',
        'uglify:dist'
    ]);
};