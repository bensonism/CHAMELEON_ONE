'use strict';

var REPTILEHAUS = require('../grunt.config.json');

module.exports = {
    postcss: {
        options: {
            map: true,
            processors: [
                require('autoprefixer')
            ]
        },
        src: REPTILEHAUS.production_css_path
    }
};
