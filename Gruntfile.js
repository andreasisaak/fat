module.exports = function (grunt) {
    grunt.initConfig({
        watch: {
            sass: {
                files: ['assets/scss/**/*.scss', 'assets/scss/*.scss'],
                tasks: ['sass:dist']
            }
        },
        sass: {
            dist: {
                files: {
                    'assets/css/app.css': 'assets/scss/application.scss'
                },
                options: {
                    outputStyle: 'compressed',
                    includePaths: require('node-bourbon').includePaths
                }
            }
        }
    });

    grunt.registerTask('default', ['sass:dist', 'watch']);
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
};
