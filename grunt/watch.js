

'use strict';

var REPTILEHAUS = require('../grunt.config.json');

module.exports = {
    watch: {
        files: [ 
                 REPTILEHAUS.directory_sass_uri,
                 REPTILEHAUS.directory_uri
                ],
        tasks: ['style','strip','rem','cssprefixer']
    },
};


