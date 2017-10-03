'use strict';

var REPTILEHAUS = require('../grunt.config.json');

function log(err, stdout, stderr, cb) {
    if (err) {
        cb(err);
        return;
    }
    console.log(stderr); 
    console.log(err);     
    console.log(stdout);
    cb();
}

module.exports = { 
    firsttime: {
        command: [ "sudo npm install -g bower-update-all",
                   "sudo npm install -g npm-check-updates",
                   "sudo npm install -g bower", 
                   "sudo npm install -g grunt-cli",                 
                 ].join('&&'),
        options: {
            callback: log
        }
    },
    updates: {
        command: [ "npm-check-updates -u --packageFile package.json",
                   "bower-update-all"
                ].join('&&'),
        options: {
            callback: log
        }
    },
    wp_regenerate: {
        command: 'wp media regenerate --url=' + REPTILEHAUS.shell.dev_url + ' --yes --path=' + REPTILEHAUS.shell.dev_path,
        options: {
            callback: log
        }
    }

};



