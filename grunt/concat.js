'use strict';

var REPTILEHAUS = require('../grunt.config.json');

module.exports = {
    concat: {
        src: REPTILEHAUS.libs.js,
        dest: REPTILEHAUS.production_js_path_nonmin,
        nonull: true, // if file is missing give an error
        options: {
            separator: ';'
        }
    },
};
