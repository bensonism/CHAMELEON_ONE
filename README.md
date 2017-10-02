# Whats the Sh*t's and Giggles with this

My name is Paddy O'Sullivan and Im a freelance full stack Developer from Ireland but currently living in Prague. For my sins I do a lot wordpress sites, because of this I have spent a lot of tme researching ways and frameworks that will speed up my development process and ensure that I get projects done with minimal fuss and as quickly as possible but without comprimising attention to detail.

Detail is the key word here and the devil is in it - how much time do we lose searching for stuff weve used before ? a lot so this is where I save most stuff that I need to do over and over. 

This theme upon activation (after running grunt also) will already have a slider, masonry, popups for videos or gallery. The theme is setup to not use wp-content and rather use a new directory called /app and some other nice stuff... Thats out of the box. 

Theres a lot to this theme and it is sloppy because I know where everything is etc so I have decided to open source it for Hacktoberfest 2017 to get others to help and add their nice time saving features etc.


# Starting a project

1) Create a virutal host on your OS via MAMP, Apache etc. Point localhost to the domain specified in the vhost. Install your dependancies via bower, yarn or npm.

In the wp-config file there is a variable referencing:

```
$webroot_dir = $root_dir . '/web';
```

this may change on the live server so keep that in mind.

2) find the paths to the files you are looking for and if they are to be used in a grunt task for instance Slick slider then you must add them to the grunt.config.json file in the libs->js section like here:
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

3) Also worth updating is any instance of the themes name in this file. If you want to install the wpcli and automatically regenerate your images then you will also need to update the following entries, this assumes you are developing the site using virtual hosts/domain names:
    ```
    "dev_url": "http://www.demosite.io/",
    "dev_path": "/Applications/MAMP/htdocs/REPTILEHAUS/Development/WP_SKELETON2/web" 
    ```




# SASS Mixins

When you run grunt it will generate a sprite and a SASS stylesheet containing
all the images filenames as variable names making it really simple to load them into your stylesheet 
using this mixin: 
```
@include sprite($imagename)
```


I also have another mixing which will create rem values as well as fallback pixel values

```
.o-masthead--header {
    @include rem(font-size, 22px);
    @include rem(line-height, 25px);    
}
```



### GRUNT Tasks

open a terminal and type grunt to execute the default tasks

```
grunt
```

- Sprites 
runs as part of the default task
Cut out all your sprites you need and drop them all into the src/sprite folder, grunt will generate a 
spritesheet and a sass file with all the images for easy use.

- Javascript minification and uglification
runs as part of the default task

---





# Functions Activation

The functions file cntains a number of includes relating to additional features or external modules. feel free to enable them and try them out

```
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CPT_TAX . 'custom_post_types.php'); // My post types
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CPT_TAX . 'custom_taxonomies.php'); // My Taxonomies
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_MENUS ); // My Menus
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_OPTIONS . 'nhp-options.php'); // NHP Theme Options Framework
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'cleanup-functions.php'); // cleanup the wordpress head
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'extend-editor.php');
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'helpers.php'); // helpers

.... etc .... etc 
```

# Project Stricture

i. Menus are created in theme/inc/menus.php (see function activation) 
ii. Custom Post Types and Taxonomies are created in theme/inc/cpt-taxonomies/{custom_post_types custom_taxonomies}.php (see function activation) 
iii. Various classes that I have found useful are in theme/inc/classes (see function activation) 
iv. NHP options are available in theme/inc/options (see function activation) 
v. Some widgets are available under theme/inc/widgets (see function activation) 

# Important
1) change any instance of www.demosite.io in wp-config.php and grunt.config.json to your sites name.






