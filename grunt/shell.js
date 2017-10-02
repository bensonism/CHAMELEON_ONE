'use strict';

var REPTILEHAUS = require('../grunt.config.json');

module.exports = { 

    start: {
        command: ["bower install"].join('&&')
    },
    wp_regenerate: {
        command: 'wp media regenerate --url=' + REPTILEHAUS.shell.dev_url + ' --yes --path=' + REPTILEHAUS.shell.dev_path
    }

};



