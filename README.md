# Whats the Sh*t's and Giggles with this

## Introduction
My name is Paddy O'Sullivan and Im a freelance full stack Developer from Ireland but currently living in Prague. For my sins I do a lot wordpress sites, because of this I have spent a lot of tme researching ways and frameworks that will speed up my development process and ensure that I get projects done with minimal fuss and as quickly as possible but without comprimising attention to detail.

Detail is the key word here and the devil is in it - how much time do we lose searching for stuff weve used before ? a lot so this is where I save most stuff that I need to do over and over. 

This theme upon activation (after running grunt also) will already have a slider, masonry, popups for videos or gallery. The theme is setup to not use wp-content and rather use a new directory called /app and some other nice stuff... Thats out of the box. 

Theres a lot to this theme and it is sloppy because I know where everything is etc so I have decided to open source it for Hacktoberfest 2017 to get others to help and add their nice time saving features etc.

# Installations

## Requirements
1. PHP
2. Apache
3. Mysql
4. Grunt

## Local Installation
1. Create a virutal host on your OS via MAMP,XAMPP, LAMP, Apache etc and then point localhost to the domain specified in the vhost. 

* If you are using MAMP on OSX you can do this by opening the following file "/Applications/MAMP/conf/apache/extra/httpd-vhosts.conf" and adding an entry like this (obviosly replace with the path to where you have the site on your computer, the web folder references the web folder in this repo) and pick whatever domain you wish, it can be facebook.com if you really want:
```
 <VirtualHost *:80>
          DocumentRoot "/Applications/MAMP/htdocs/REPTILEHAUS/Development/WP_SKELETON2/web"
          ServerName www.demosite.io
 </VirtualHost>
```
* Next up you need to map the domain you previously chose to your local environment.. on OSX you can do this by adding an entry to your hosts file "/Volumes/Macintosh HD/private/etc/hosts" like this:
```
127.0.0.1               www.demosite.io
```
* This is a bit of a pain to setup, which is why I have reduced this to 2 commands.. when this project takes off a bit il share my setup scripts but its important to manually learn these steps.
* Install your dependancies via bower, yarn or npm.
* In the wp-config file there is a variable referencing the folloewing but this may change on the live server so keep that in mind:
```
$webroot_dir = $root_dir . '/web';
```
2. find the paths to the files you are looking for and if they are to be used in a grunt task for instance Slick slider then you must add them to the grunt.config.json file in the libs->js section like here:
   ```
    "libs": {
        "js": [ "bower_components/jquery/dist/jquery.min.js",
                "bower_components/masonry/dist/masonry.pkgd.min.js",  
                "bower_components/mixitup2/dist/mixitup.min.js",          
                "bower_components/lity/dist/lity.min.js", 
                "bower_components/remodal/dist/remodal.min.js",
                "bower_components/slick-carousel/slick/slick.min.js",   
                "bower_components/fancybox/source/jquery.fancybox.js",
                "bower_components/fancybox/source/helpers/jquery.fancybox-media.js" ]
    },
    ```    
    a simple way to find the paths is to open a terminal and enter 
    ```
    find bower_components/ -iname "*.js"
    ```
3. Also worth updating is any instance of the themes name in this file. If you want to install the wpcli and automatically regenerate your images then you will also need to update the following entries, this assumes you are developing the site using virtual hosts/domain names:
    ```
    "dev_url": "http://www.demosite.io/",
    "dev_path": "/Applications/MAMP/htdocs/REPTILEHAUS/Development/WP_SKELETON2/web" 
    ```

## SASS Mixins
* When you run grunt it will generate a sprite and a SASS stylesheet containing all the images filenames as variable names making it really simple to load them into your stylesheet 
using this mixin: 
```
@include sprite($imagename)
```
* I also have another mixing which will create rem values as well as fallback pixel values
```
.o-masthead--header {
    @include rem(font-size, 22px);
    @include rem(line-height, 25px);    
}
```

## GRUNT Tasks

* The default grunt task Ive written is all you need to get setup. when you type `grunt` it compiles your SASS, concatenates and minifies your javascript and generates a sprite from any PNG images you have in the designated sprites folder (./src/sprites).. pretty cool, but first its important to install your JS libraries via bower or npm then add them to the grunt.config.json file, otherwise nothing will happen. 

Open a terminal and type grunt to execute the default tasks (concat, minify, sprite gen) and then it will start to watch for changes to your SASS files for compiling.. the SASS compilation is actually a number of tasks grouped together so its worth paying attention here, my sass compilationn also includes css minify that removes ALL comments, pixel to rem conversion with fallback to pixels, css auto-prefixer powered by can-i-use and of course, SASS compiled to CSS in your themes directory.
```
grunt
```

* In an effort to ensure any developers are running with the same system and global packages necessary, I have created some shell commands. The first will install grunt-cli, bower, bower-update-all and npm-check-updates as well as that it will download and install the wp-cli an essential too in any wordpress developers toolkit. To run it execute:

```
grunt setup
```

* Next up there is a shell command which will update all npm packages and bower packages to their latest version (use at your own risk):

```
grunt updates
```

* Next we have a shell command for going live. This will need the wpcli installed (done if you ran grunt setup) as well as the correct url this dev site is using and the full path on your system these are both set in the grunt.config.json file, once you have this information setup correctly it will regenerate all the images in your wordpress install.. awesome right!!! As well as that it optimises every image afterwards using grunts image-min package.. a nice little SEO helper.

```
grunt goLive
```


* If you are localizing (L10N) or Internationalizing (I18N) your theme then Ive got you covered with a grunt task to generate a source language PO file with all the strings contained in your theme, all you need to do is download POedit and start creating your translation strings from that.. to use this task be sure to have translation strings in youur theme then run the following task to output them to a po file in the themes language folder

```
grunt translate
```

More often than not the basic grunt task is all you'll need


# SASS

* The project has a base system of modular component based SASS files in ./src/sass youll see some folders 
common 
    _fonts.scss (add fonts declarations here)
    _helpers.scss (some regular css classes i use regularly to simplify development)
    _mixins.scss (some handy mixins I use)
    _spritesheets.scss (generated by grunt and contains references for use by the sprite() mixin )
    _variables.scss ( Probably the most important file, it contains the font sets to be used, global colours, font sizes, grid widths etc)    
custom
    refers to plugins installed via grunt, this folder is static as in these files may or may not be f use to your project and are not generated by any smart build process. 
    I would recomment keeping the sass font awesome one though as its something i compiled and update due to there being no official sass version of font awesome and realistically importing the whole font-awesome library is a waste, using the mixin for icon() you just import the icon you need.
components
    Again this is up to you, ive created some regular components you use in a site (header, footer, slider, nav) feel free to add or remove as you go.. if you dont already work this way it can seem daunting but after a while having component baed css will help you out on other jobs... cannot recommend this approach enough.
boa-sass
    ignore this or use it.. its actually nebula-css but ive altered it for my needs, not a necessity but i like it a lot.

##  Functions Activation
The functions file cntains a number of includes relating to additional features or external modules. feel free to enable them and try them out
```
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CPT_TAX . 'custom_post_types.php'); // My post types
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CPT_TAX . 'custom_taxonomies.php'); // My Taxonomies
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_MENUS ); // My Menus
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_OPTIONS . 'nhp-options.php'); // NHP Theme Options Framework
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'cleanup-functions.php'); // cleanup the wordpress head
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'extend-editor.php');
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'helpers.php'); // helpers
```
## Project Structure
1. Menus are created in theme/inc/menus.php (see function activation) 
2. Custom Post Types and Taxonomies are created in theme/inc/cpt-taxonomies/{custom_post_types custom_taxonomies}.php (see function activation) 
3. Various classes that I have found useful are in theme/inc/classes (see function activation) 
4. NHP options are available in theme/inc/options (see function activation) 
5. Some widgets are available under theme/inc/widgets (see function activation) 

## Important
> Change any instance of www.demosite.io in wp-config.php and grunt.config.json to your sites name.





## Reporting Issues
* Security Issues to be sent directly to me [here](mailto:hello@reptilehaus.io)
* Any other Issues to be submitted [here](https://github.com/REPTILEHAUS/CHAMELEON_ONE/issues)














## Legal

### nebula-css
    The MIT License (MIT)
    
    Copyright (c) 2017 Robert Smith
    
    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:
    
    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.
    
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    SOFTWARE.
