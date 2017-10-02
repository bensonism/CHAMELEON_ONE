'use strict';

var REPTILEHAUS = require('../grunt.config.json');

module.exports = {
    px_to_rem: {

          options: {
            base: 16,
            fallback: true,
            fallback_existing_rem: false,
            ignore: [],
            map: false
          },
          files: {
            [REPTILEHAUS.production_css_path]: [REPTILEHAUS.production_css_path]
          }
        
      }    

};





