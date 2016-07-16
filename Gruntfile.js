'use strict';

module.exports = function(grunt) {

  // load all grunt tasks matching the `grunt-*` pattern
  require('load-grunt-tasks')(grunt);

  // Configurable paths for the site
  var globalConfig = {
    path: 'wp-content/themes/nyc-prosthodontics'
  };

  // Define the configuration for all the tasks
  grunt.initConfig({

    // Project settings
    globalConfig: globalConfig,

    pkg: grunt.file.readJSON('package.json'),

    // Watches files for changes and runs tasks based on the changed files
    watch: {
      compass: {
        files: ['<%= globalConfig.path %>/library/scss/**/*.scss'],
        tasks: ['compass:dev'],
      },
      js: {
        files: ['<%= globalConfig.path %>/library/js/**/*.js','!**/min/**'],
        tasks: ['uglify']
      }
    },
    compass: {
      dev: {
        options: {
          sassDir: ['<%= globalConfig.path %>/library/scss/'],
          cssDir: ['<%= globalConfig.path %>/library/css'],
          environment: 'development',
          outputStyle: 'compressed',
          // outputStyle: 'expanded',

        }
      },
    },
    uglify: {
      all: {
        options: {
            banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
        //  UNCOMMENT THE FOLLOWING TO DEBUG
        //  beautify: true,
        //  compress: false,
        //  mangle: false
        },

        files: {
          '<%= globalConfig.path %>/library/js/min/scripts-min.js': [

          //import libs here
          '<%= globalConfig.path %>/library/js/libs/bootstrap/collapse.js',
          '<%= globalConfig.path %>/library/js/libs/bootstrap/dropdown.js',
          '<%= globalConfig.path %>/library/js/libs/bootstrap/transition.js',
          //'<%= globalConfig.path %>/library/js/libs/bootstrap-select/bootstrap-select.min.js',
          //'<%= globalConfig.path %>/library/js/libs/magnific-popup/magnific-popup.js',
          '<%= globalConfig.path %>/library/js/libs/share/jquery.sharrre.js',
          '<%= globalConfig.path %>/library/js/libs/slick/slick.js',
          '<%= globalConfig.path %>/library/js/libs/tappy/tappy.js',

          //include base scripts.js
          '<%= globalConfig.path %>/library/js/scripts.js',

          //append scripts here
          '<%= globalConfig.path %>/library/js/libs/bootstrap/offcanvas.js',
          '<%= globalConfig.path %>/library/js/libs/slick/our.slick.js'
          ]
          /*
          // ############### MAPS GEOLOCATION
          '<%= globalConfig.path %>/library/js/min/geolocation-min.js': [
          '<%= globalConfig.path %>/library/js/libs/maps/geolocation.js'
          ],
          // ############### MAPS LOCATIONS
          '<%= globalConfig.path %>/library/js/min/locations-min.js': [
          '<%= globalConfig.path %>/library/js/libs/maps/locations.js'
          ],
          // ############### MAPS SINGLE
          '<%= globalConfig.path %>/library/js/min/single-location-min.js': [
          '<%= globalConfig.path %>/library/js/libs/maps/single-location.js'
          ]
          */
        }
      }
    }

  }); //end grunt.initConfig

  // Default task(s).
  grunt.registerTask('default',[
    'watch',
    'compass:dev',
    'uglify'
  ]);

};