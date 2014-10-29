module.exports = function(grunt) {
    grunt.initConfig({
        concat: {
            js: {
                src: [
                    'assets/components/jquery/dist/jquery.js',
                    'assets/components/jquery.lazyload/jquery.lazyload.js',
                    'assets/components/fluidvids/src/fluidvids.js',
                    'assets/js/app.js'
                ],
                dest: 'assets/js/app.concat.js'
            }
        },
        uglify: {
            build: {
                src: 'assets/js/app.concat.js',
                dest: 'assets/js/app.min.js'
            }
        },
        stylus: {
            compile: {
                files: {
                    'assets/css/app.min.css': 'assets/css/app.styl'
                }
            }
        },
        watch: {
            js: {
                files: [
                    'bower_components/**/*.js',
                    'assets/js/**/!(app.min|app.concat).js'
                ],
                tasks: ['javascript']
            },
            css: {
                files: [
                    'assets/css/**/*.styl'
                ],
                tasks: ['stylesheets']
            }
        }
    });
    
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-stylus');
    grunt.loadNpmTasks('grunt-contrib-watch');
    
    grunt.registerTask('javascript', [
        'concat:js',
        'uglify'
    ]);
    grunt.registerTask('stylesheets', [
        'stylus'
    ]);

    grunt.registerTask('default', ['javascript', 'stylesheets', 'watch']);
};