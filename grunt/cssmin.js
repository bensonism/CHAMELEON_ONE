'use strict';

var REPTILEHAUS = require('../grunt.config.json');

  module.exports = {
    
    cssmin: {
      options: {
        level: {
          1: {
            specialComments: 0
          }
        }
      },
        files: {
            [REPTILEHAUS.production_css_path] : [REPTILEHAUS.production_css_path]
        }
    }    
    
   

};



