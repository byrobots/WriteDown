module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Concatenate JS
        concat: {
            options: {
                separator: ';',
            },
            dist: {
                src: [
                    'node_modules/jquery/dist/jquery.js',
                    'node_modules/bootstrap/dist/js/bootstrap.js',
                    'node_modules/chosen-js/chosen.jquery.js',
                    'node_modules/simplemde/dist/simplemde.min.js',
                    'resources/assets/js/app.js'
                ],
                dest: 'public/js/app.js'
            }
        },

        // Sass configuration
        sass: {
            options: {
                sourceMap: true
            },
            dist: {
                files: {
                    'public/css/app.css': 'resources/assets/sass/app.scss'
                }
            }
        }
    });

    // Load plugins
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-sass');

    // Declare tasks
    grunt.registerTask('default', ['concat', 'sass']);
};
