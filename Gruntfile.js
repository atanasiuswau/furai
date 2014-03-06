'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.min.js'
      ]
    },
    copy: {
      main: {
        files: [
          {expand: true, cwd: 'bower_components/foundation/scss/foundation', src: ['_settings.scss'], dest: 'assets/scss'},
          {expand: true, cwd: 'bower_components/modernizr', src: ['modernizr.js'], dest: 'assets/js/vendor'},
          {expand: true, cwd: 'bower_components/jquery/dist', src: ['jquery.min.js'], dest: 'assets/js/vendor'}
        ]
      }
    },
    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'assets/css/main.min.css': 'assets/scss/app.scss'
        }        
      }
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [
            'bower_components/foundation/js/foundation/foundation.js',
            'bower_components/foundation/js/foundation/foundation.abide.js',
            'bower_components/foundation/js/foundation/foundation.accordion.js',
            'bower_components/foundation/js/foundation/foundation.alert.js',
            'bower_components/foundation/js/foundation/foundation.clearing.js',
            'bower_components/foundation/js/foundation/foundation.dropdown.js',
            'bower_components/foundation/js/foundation/foundation.equalizer.js',
            'bower_components/foundation/js/foundation/foundation.interchange.js',
            'bower_components/foundation/js/foundation/foundation.joyride.js',
            'bower_components/foundation/js/foundation/foundation.magellan.js',
            'bower_components/foundation/js/foundation/foundation.offcanvas.js',
            'bower_components/foundation/js/foundation/foundation.orbit.js',
            'bower_components/foundation/js/foundation/foundation.reveal.js',
            'bower_components/foundation/js/foundation/foundation.tab.js',
            'bower_components/foundation/js/foundation/foundation.tooltip.js',
            'bower_components/foundation/js/foundation/foundation.topbar.js',
            'assets/js/_*.js'
          ]
        },
        options: {
          // JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          // sourceMap: 'assets/js/scripts.min.js.map',
          // sourceMappingURL: '/app/themes/roots/assets/js/scripts.min.js.map'
        }
      }
    },
    version: {
      options: {
        file: 'lib/scripts.php',
        css: 'assets/css/main.min.css',
        cssHandle: 'roots_main',
        js: 'assets/js/scripts.min.js',
        jsHandle: 'roots_scripts'
      }
    },
    watch: {
      sass: {
        files: [
          'assets/scss/*.scss'
        ],
        tasks: ['sass', 'version']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify', 'version']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: false
        },
        files: [
          'assets/css/main.min.css',
          'assets/js/scripts.min.js',
          'templates/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'assets/css/main.min.css',
        'assets/js/scripts.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-wp-version');
  grunt.loadNpmTasks('grunt-contrib-copy');

  // Register tasks
  grunt.registerTask('build', [
    'copy',
    'sass',
    'uglify'
  ]);
  grunt.registerTask('default', [
    'clean',
    'sass',
    'uglify',
    'version'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
