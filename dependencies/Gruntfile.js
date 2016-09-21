var files = {};
files.css = [
    '../assets/less/base.less',
];
files.js = [
    '../assets/components/jquery/dist/jquery.min.js',
    '../assets/components/bootstrap/dist/bootstrap.min.js',
    '../assets/js/script.js'
];
files.exclusions = [
    '.DS_Store',
    'Thumbs.db',
    '.git',
    '.idea',
    '.gitignore',
    '../assets',
    '../dependencies',
];


var options = {
    livereload: {
        host: 'localhost',
        port: 9001,
    }
};

var auth = {
    host: 'w0126d9b.kasserver.com',
    port: 21,
    authKey: 'ftpdata'
};



module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        less: {
            development: {
                options: {
                    paths: ['assets/css'],
                    compress: true
                },
                files: {
                    '../htdocs/built/main.css': files.css
                }
            }
        },
        uglify: {
            my_target: {
                files: {
                    '../htdocs/built/main.js': files.js
                }
            }
        },
        'ftp-deploy': {
            build: {
                auth: auth,
                src: '../',
                dest: 'fw.graphic-concepts.de/',
                exclusions: files.exclusions
            },
            vendor: {
                auth: auth,
                src: '../dependencies/vendor',
                dest: 'fw.graphic-concepts.de/dependencies/vendor',
            },
            assets: {
                auth: auth,
                src: '../assets',
                dest: 'fw.graphic-concepts.de/assets',
            }
        },
        watch: {
            css: {
                files: ['../htdocs/**/*.less'],
                tasks: ['less']
            },
            js: {
                files: ['../htdocs/assets/js/*.js'],
                tasks: ['uglify']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-ftp-deploy');
    grunt.loadNpmTasks('grunt-contrib-watch');


    // Default task(s).
    grunt.registerTask('default', [''/*'less', 'uglify', 'watch'*/]);
    grunt.registerTask('publish', ['ftp-deploy:build']);
    grunt.registerTask('publish-vendor', ['ftp-deploy:vendor']);
    grunt.registerTask('publish-assets', ['ftp-deploy:assets']);
};