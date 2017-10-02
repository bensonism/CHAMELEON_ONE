'use strict';

var REPTILEHAUS = require('../grunt.config.json');

module.exports = {

    sass: { 
        options: {
            sourceMap: false,
            outputStyle: 'compressed',
        },
        files: {
            [ REPTILEHAUS.production_css_path ]: REPTILEHAUS.source_sass
        }
        
    },
    
};



