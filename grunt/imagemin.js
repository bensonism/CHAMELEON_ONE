'use strict';

var REPTILEHAUS = require('../grunt.config.json');

module.exports = {
    imagemin: {
        dist: {
            files: [{
                expand: true,
                cwd: REPTILEHAUS.imagemin_src_dir,
                src: ['**/*.{png,jpg,JPG,gif}'],
                dest: REPTILEHAUS.imagemin_dest_dir
            }]  
        }
    },
};
