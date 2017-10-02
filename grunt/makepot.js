'use strict';

var REPTILEHAUS = require('../grunt.config.json');

module.exports = { 
    makepot: {
        options: {
            type: 'wp-theme',
            cwd: REPTILEHAUS.i18n.files_to_internationalize,
            domainPath: REPTILEHAUS.i18n.output_lang_files_to,
            mainFile: REPTILEHAUS.i18n.main_css_file,
            potFilename: REPTILEHAUS.i18n.source_pot_file_lang_name,
            processPot: function(pot, options) {
                pot.headers['report-msgid-bugs-to'] = REPTILEHAUS.i18n.send_bugs_to;
                pot.headers['language-team'] = REPTILEHAUS.i18n.language_team;
                return pot;
            },
            exclude: ["inc/.*", "assets/*"], 
        }
    }    
};



