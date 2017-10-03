'use strict';

var REPTILEHAUS = require('../grunt.config.json');


var baseDir  = './src/svgs',   // <-- Set to your SVG base directory
svgGlob      = '**/*.svg',       // <-- Glob to match your SVG files
outDir       = './src',     // <-- Main output directory
config       = {
    "dest": "assets/images",
    "log": "info",
    "mode": {
        "defs": true,
        "symbol": true,
        "render"			: {	
            scss		: true,
            dest : './src',
            				// Stylesheet rendering definitions
            /* -------------------------------------------
            css			: false,						// CSS stylesheet options
            scss		: false,						// Sass stylesheet options
            less		: false,						// LESS stylesheet options
            styl		: false							// Stylus stylesheet options
            <custom>	: ...							// Custom stylesheet options
            -------------------------------------------	*/
        },
        "example"			: true	
    }
};



module.exports = {
    
    
    // svg_sprite        : {
    //     dist          : {
    //         expand    : true,
    //         cwd       : baseDir,
    //         src       : [svgGlob],
    //         dest      : outDir,
    //         options   : config
    //     }
    // },
    
	svg_sprite		: {
        expand		: true,
        cwd			: './src/svgs',
        src			: ['**/*.svg'],
        dest		: './src',
        
        options : {
        mode					: {
            symbol 				: {
                // dest			: "<mode>",						// Mode specific output directory
                prefix			: "svg-%s",						// Prefix for CSS selectors
                dimensions		: "-dims",						// Suffix for dimension CSS selectors
                //sprite			: "svg/sprite.<mode>.svg",		// Sprite path and name
                bust			: true|false,					// Cache busting (mode dependent default value)
                render			: {								// Stylesheet rendering definitions
                    /* -------------------------------------------
                    css			: false,						// CSS stylesheet options
                    scss		: false,						// Sass stylesheet options
                    less		: false,						// LESS stylesheet options
                    styl		: false							// Stylus stylesheet options
                    <custom>	: ...							// Custom stylesheet options
                    -------------------------------------------	*/
                },
                example			: true							// Create an HTML example document
            }
        }    
    }    
        
// options : {
//     mode : {
//         view : {			// Activate the «view» mode
//             bust : false,
//             render : {
//                 scss : true		// Activate Sass output (with default options)
//             }
//         },
//         symbol : true		// Activate the «symbol» mode
//     }
// }
        
        
        
	}    
    
 

};