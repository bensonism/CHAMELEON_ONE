'use strict';

var REPTILEHAUS = require('../grunt.config.json');

module.exports = {
    
    standard: {
        src: REPTILEHAUS.source_sprite_images,
        dest: REPTILEHAUS.production_sprite_generic,
        imgPath: '../images/sprite.png',
        destCss: REPTILEHAUS.source_sprite_sass
    },
    
    retina: {
        // Include all normal and `-2x` (retina) images  e.g. `github.png`, `github-2x.png`
        src: REPTILEHAUS.source_sprite_images,
        // Filter out `-2x` (retina) images to separate spritesheet
        //   e.g. `github-2x.png`, `twitter-2x.png`
        retinaSrcFilter: ['*-2x.png'],
        // Generate a normal and a `-2x` (retina) spritesheet
        dest: REPTILEHAUS.production_sprite_generic,
        retinaDest: REPTILEHAUS.production_sprite_retina,
        imgPath: '../images/sprite.png',
        // imgPath: 'assets/imagffes/sprite.png',
        // Generate SCSS variables/mixins for both spritesheets
        destCss: REPTILEHAUS.source_sprite_sass
    },    

};