'use strict';

var REPTILEHAUS = require('../grunt.config.json');

module.exports = {
    uglify: {
        options: {
            mangle: false,
            nonull: true,
            expand: true,
        },
        files: {
            [ REPTILEHAUS.production_js_path_final ] : [ REPTILEHAUS.production_js_path_nonmin ]
        }
    },
};
