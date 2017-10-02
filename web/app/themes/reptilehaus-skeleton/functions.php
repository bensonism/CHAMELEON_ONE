<?php
load_theme_textdomain( 'REPTILEHAUS', get_template_directory() . '/lang' );

// Disable use XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Disable X-Pingback to header
add_filter( 'wp_headers', 'disable_x_pingback' );
function disable_x_pingback( $headers ) {
    unset( $headers['X-Pingback'] );

return $headers;
}
define('GOOGLE_ANALYTICS', '');
define( 'RH_ENVIRONMENT', 'DEV' );
define( 'THE_REPTILES_HAUS', site_url() );
define( 'THE_REPTILE_THEME_PATH', get_template_directory() );
define( 'THE_REPTILE_THEME_URL', get_template_directory_uri() );
define( 'THE_REPTILE_FRAMEWORK', '/inc/');

define( 'REPTILEHAUS_CLASSES', 'classes/');
define( 'REPTILEHAUS_FUNCTIONS', 'functions/');
define( 'REPTILEHAUS_CPT_TAX', 'cpt-taxonomies/');
define( 'REPTILEHAUS_OPTIONS', 'options/');
define( 'REPTILEHAUS_WIDGETS', 'widget/');
define( 'REPTILEHAUS_VISUAL_COMPOSER', '/vc/autoload.php');
define( 'REPTILEHAUS_MENUS', '/menus.php');
define( 'REPTILEHAUS_PATTERNLAB', '/assets/dev-libraries/styleguide/public/');
define( 'REPTILEHAUS_STYLES_URL', '/assets/css/');
define( 'REPTILEHAUS_JAVASCRIPT_URL', '/assets/js/');
define( 'REPTILEHAUS_IMAGES_URL', '/assets/images/');
define( 'REPTILEHAUS_ADMIN_CUSTOM_SITE_LINK', 'BRAND URL GOES HERE');
define( 'REPTILEHAUS_ADMIN_CUSTOM_LOGO_TITLE', 'BRAND NAME GOES HERE');

define( 'REPTILEHAUS_GOOGLE_MAPS_API_KEY', '');

define( 'TWITTER_CONSUMER_KEY', '');
define( 'TWITTER_CONSUMER_SECRET', '');
define( 'TWITTER_ACCESS_TOKEN', '');
define( 'TWITTER_ACCESS_TOKEN_SECRET', '');

// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CPT_TAX . 'custom_post_types.php'); // My post types
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CPT_TAX . 'custom_taxonomies.php'); // My Taxonomies
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_MENUS ); // My Menus
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_OPTIONS . 'nhp-options.php'); // NHP Theme Options Framework
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'cleanup-functions.php'); // cleanup the wordpress head
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'extend-editor.php');
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'helpers.php'); // helpers
/*
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_VISUAL_COMPOSER ); // My custom visual composer templates, widgets etc
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'html-compression.php'); // html-compression
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'nav-walkers.php'); // nav-walkers
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'optional.php'); // optional
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_FUNCTIONS . 'widgets.php'); // widgets
*/
# CLASSES INIT
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CLASSES . 'gump_validation/gump.class.php'); // Gump Form Validation
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CLASSES . 'custom_taxonomy_meta/Tax-meta-class.php'); // Custom Easy Taxonomy Meta Fields for Categories, tags and taxonomies
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CLASSES . 'custom_taxonomy_meta/LMD_custom_tax.php'); // My custom tax items defined here
require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CLASSES . 'jigsaw/jigsaw.php'); // jigsaw
# WIDGETS INIT
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_WIDGETS . 'widgets.php');
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_WIDGETS . 'image-advert-widget/image-widget.php');
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_WIDGETS . 'menu-widget/menu-widget.php');
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_WIDGETS . 'menu-hierarchy-widget/menu-hierarchy-widget.php');
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_WIDGETS . 'tag-block/tag-block.php');
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_WIDGETS . 'image-advert-widget/full-width-ad.php');
// require_once( THE_REPTILE_THEME_PATH . THE_REPTILE_FRAMEWORK . REPTILEHAUS_CLASSES . 'extend-search-capabilities/search.php');







function RH_Scripts() { 
    wp_deregister_script('jquery');
    wp_register_script('google-maps', '//maps.googleapis.com/maps/api/js?key=' . REPTILEHAUS_GOOGLE_MAPS_API_KEY, array(), '3', true);
    wp_register_script( 'plugins', THE_REPTILE_THEME_URL . REPTILEHAUS_JAVASCRIPT_URL . 'production.min.js', array(), '1.0.0', true );
    wp_register_script( 'app', THE_REPTILE_THEME_URL . REPTILEHAUS_JAVASCRIPT_URL . 'app.js', array('plugins'), '1.0.0', true );
   // wp_localize_script( 'plugins', 'reptilehaus_cat', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        $RH_Scripts = array( 'plugins',
                             // 'google-maps',
                             // 'plugins',
                             'app'
                            );

        wp_localize_script( 'plugins', 'ajax_posts', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'noposts' => __('No older posts found', 'twentyfifteen'),
        ));

        wp_enqueue_script( $RH_Scripts );
}
add_action('wp_enqueue_scripts', 'RH_Scripts'); 









function alter_search_ppp_wpse_106961($qry) {
  if ($qry->is_main_query() && $qry->is_search()) {
    $qry->set('posts_per_page',10);
  }
}
add_action('pre_get_posts','alter_search_ppp_wpse_106961');










function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();

    $alt_image = get_field('alternative_home_image');

    if( $alt_image ){
        $feat_big         = wp_get_attachment_image_src( $alt_image , 'full' );
    } else {
        $feat_big         = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'home-featured' );
    }

  
  $out .= '<article class="o-grid__item u-1/3@lg u-1/3@md u-1/2@sm u-1/1">
        <div class="c-article__content--wrapper c-article__image">
            <a href="' . get_the_permalink() . '" class="image_3x3 image-container">
                <img src="' .  $feat_big[0] . '" alt="">
                <div class="c-article__image--overlay dark">
                    <div class="c-table">
                    <div class="c-table--row">
                        <div class="c-table--cell align-center overlay-text">
                            <!--<i class="chev line-up"></i>
                            <span class="read-on line-up">
                                
                            </span>-->
                        </div>
                    </div>
                    </div>
                </div>
            </a>
        </div> 
        <div class="c-article__content--wrapper c-article__title--block">
        <h1>
            <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
        </h1>
        </div>      
    </article>';


    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

 
















if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 50, 50, true ); 
    add_image_size( 'home-featured', 426, 243, true );       
}


// retrieves the attachment ID from the file URL
function site_images($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}









/*

REPTILEHAUS THEME SETUP

Creates the homepage and removes all the default wordpress content
also sets the new homepage as the static frontpage as well as its 
template.

Remove this function once live

*/

add_action( 'after_switch_theme', 'remove_default_content' );

function remove_default_content($defaultPage ) {

// add_option('REPTILEHAUS-THEME', 1);

$reptilehomepage = get_page_by_title( 'Homepage' );


if( !$reptilehomepage ){ // make sure that the page hasnt been created already after a previous homepage switch

    // Find and delete the WP default 'Sample Page'
    $defaultPage = get_page_by_title( 'Sample Page' );
    wp_delete_post( $defaultPage->ID, $bypass_trash = true );

    // Find and delete the WP default 'Hello world!' post
    $defaultPost = get_posts( array( 'title' => 'Hello World!' ) );
    wp_delete_post( $defaultPost[0]->ID, $bypass_trash = true );


$PageGuid = THE_REPTILES_HAUS . "/homepage";
$my_post  = array( 'post_title'     => 'Homepage',
                   'post_type'      => 'page',
                   'post_name'      => 'homepage',
                   'post_content'   => 'This is the automatically generated homepage by the REPTILEFRAMEWORK.',
                   'post_status'    => 'publish',
                   'comment_status' => 'closed',
                   'ping_status'    => 'closed',
                   'post_author'    => 1,
                   'menu_order'     => 0,
                   'guid'           => $PageGuid,
                   'page_template'  => 'page-homepage.php'
                   );

$PageID = wp_insert_post( $my_post, FALSE ); // Get Post ID - FALSE to return 0 instead of wp_error.

// Use a static front page
$about = get_page_by_title( 'Homepage' );
update_option( 'page_on_front', $about->ID );
update_option( 'show_on_front', 'page' );

// Set the blog page
// $blog   = get_page_by_title( 'Blog' );
// update_option( 'page_for_posts', $blog->ID );

}

}






/*

Replaces User Nice Names with ID numbers instead - security through obscurity - only prevents hackers knowing usernames off the bat of via the sitemap

*/
add_action( 'user_register', 'secure_no_nice_names', 10, 1 );
function secure_no_nice_names( $user_id ) {
    if ( isset( $_POST['user_login'] ) && isset( $_POST['email'] ) && isset( $_POST['last_name'] ) &&  isset( $_POST['url'] ) && isset( $_POST['role'] )  )
       wp_update_user( array( 'ID' => $user_id, 'user_nicename' => $user_id ) );
}




/*

REPTILEHAUS THEME ADDITIONS

*/
function RH_custom_login_styles() {
  wp_enqueue_style( 'functions', THE_REPTILE_THEME_URL . REPTILEHAUS_STYLES_URL . 'login-style.css' ); // Functions file only
}
add_action( 'login_enqueue_scripts', 'RH_custom_login_styles' );


function RH_custom_admin_styles() {
  wp_enqueue_style( 'admin_css', THE_REPTILE_THEME_URL . REPTILEHAUS_STYLES_URL . 'admin-style.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'RH_custom_admin_styles' );




function RH_PatternLab_Button($wp_admin_bar){
  $args = array(
    'id'     => 'pattern-lab',
    'title'  => 'REPTILEHAUS Pattern Lab',
    'href'   =>   THE_REPTILE_THEME_URL . REPTILEHAUS_PATTERNLAB,
    'meta'   => array(
    'class'  => 'pattern-lab',
    'target' => '_blank',
  ));
  $wp_admin_bar->add_node($args);
}

function RH_hide_Admin_menus() {
    remove_menu_page('edit.php?post_type=acf');
    remove_menu_page('edit.php?post_type=acf-field-group');    
    remove_menu_page('edit.php?post_type=vc_grid_item');
    remove_menu_page('plugins.php');
    remove_menu_page('index.php');
    remove_menu_page('tools.php');
  }



if( 'RH_ENVIRONMENT' == "PROD"){
  add_action( 'admin_menu', 'RH_hide_Admin_menus', 999);
} elseif( 'RH_ENVIRONMENT' == "DEV"){
  add_action( 'admin_bar_menu', 'RH_PatternLab_Button', 999);
}













/* Custom Dashboard Widget */
add_action('wp_dashboard_setup', 'RH_dash_widgets');
function RH_dash_widgets() {
  global $wp_meta_boxes;
  wp_add_dashboard_widget('REPTILEHAUS_custom_a', 'REPTILEHAUS: Support Message', 'RH_support_message_widget');
}
function RH_support_message_widget() {
  $message = '';
  $message .= '<p>This site was developed by <b>REPTILEHAUS</b></p>';
  $message .= '<p>This website is build on the WordPress Content Management System which we have highly modified using our trademark <strong>REPTILEFRAMEWORK</strong> for added security and functionality.</p>';
  $message .= '<p>The end result is a great site that performs to your high demands as well as having the easy to use, familiar user interface of Wordpress.</p>';
  $message .= '<p>While every care has been taken to mitigate and issues or bugs, should you come across one please do not hesitate to contact us via email <strong><a target="_blank" href="mailto:hello@reptilehaus.io">here</a></strong>.</p>';
  echo $message;
}






/* 

POST VIEWS COLUMN IN ADMIN AREA

Add custom column to the admin area -
be sure to add the correct classes to my custom admin stylesheet

SET IN THE HEADER USING $set_views = is_singular() ? setPostViews($post->ID) : '';

*/
Jigsaw::add_column(array('post', 'tutorial', 'project'), 'Views', function($pid){
  GLOBAL $post;
    $data = array();
    $count_key = 'post_views_count';
    echo $data['post'] = get_post_meta($post->ID, $count_key, true);
    if($data['post']==''){
        delete_post_meta($post->ID, $count_key);
        add_post_meta($post->ID, $count_key, '0');
        return "0 View";
    }
    $pid = $data['post'].' Views';
    //echo $pid;
}, 5);























// just for getting the posts featured image
function reptilehaus_get_thumb_url() {
    $slide_image      = wp_get_attachment_image_src( get_post_thumbnail_id() , 'full' );
    return $slide_image[0];
}


function reptilehaus_acf_get_thumb_url($fieldname, $size, $defaultImage ){
    if( $defaultImage ){
      if( get_field( $fieldname ) ){
          $slide_image = wp_get_attachment_image_src( get_field( $fieldname ) , $size );
          return $slide_image[0];
      } else {
          return $defaultImage;
      }
    } else {
      $slide_image = wp_get_attachment_image_src( get_field( $fieldname ) , $size );
      return $slide_image[0];
    }
}
// usage without a default image and with one
// reptilehaus_acf_get_thumb_url("course_header_image", "full", "" );
// reptilehaus_acf_get_thumb_url("course_header_image", "full", "http://website.local/wp-content/uploads/2016/10/slide-1.png" ); 


function reptilehaus_make_sidemenu( $menu = null, $object_id = null ) {

    // get menu object
    $menu_object = wp_get_nav_menu_items( esc_attr( $menu ) );

    // stop if there isn't a menu
    if( ! $menu_object )
        return false;

    // get the object_id field out of the menu object
    $menu_items = wp_list_pluck( $menu_object, 'object_id' );

    // use the current post if object_id is not specified
    if( !$object_id ) {
        global $post;
        $object_id = get_queried_object_id();
    }

    // test if the specified page is in the menu or not. return true or false.
    return in_array( (int) $object_id, $menu_items );

}








/// NEEDED FOR THE ACF GOOGLE MAPS API

add_filter('acf/settings/google_api_key', function () {
    return REPTILEHAUS_GOOGLE_MAPS_API_KEY;
});





if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page();
  
}




































// Remove taxonomy boxes from certain pages
/*function gg_no_more_tax() {

  // remove the meta box if its an ancestor or a specific page id
   $post_id = $_GET['post'] ?/ $_GET['post'] : $_POST['post_ID'] ;
    $parent = get_post_ancestors($post_id);
    if(!in_array('13276',$parent)) {
      remove_meta_box('agegroupdiv','page','normal');
      remove_meta_box('venuediv','page','normal');
    }

// remove if its a given page
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    $parent = get_post_ancestors($post_id);
    if( $post_id == '13276' || $post_id == '13297' ) {
      remove_meta_box('Custom Settingsdiv','page','normal');
     // remove_meta_box('venuediv','page','normal');
    }

}

add_action('admin_init','gg_no_more_tax');
*/

























/*

Twitter Feed
API version 1.1

*/
function ago( $time ){
  $periods    = array("second", "minute", "hour", "day", "week", "month", "year");
  $lengths    = array("60","60","24","7","4.35","12","10");
  $now        = time();
  $difference = $now - $time;
  $tense      = "ago";
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
      $difference /= $lengths[$j];
    }
    $difference    = round($difference);
      if($difference != 1) {
        $periods[$j]   .= "s";
      }
  return "$difference $periods[$j] ago ";
}

function display_latest_tweets_v2($no_tweets, $accountname){
  require_once __DIR__ . THE_REPTILE_FRAMEWORK . "twitter/twitteroauth.php";
  $twitterConnection = new TwitterOAuth(
    TWITTER_CONSUMER_KEY,
    TWITTER_CONSUMER_SECRET,
    TWITTER_ACCESS_TOKEN,
    TWITTER_ACCESS_TOKEN_SECRET
  );
  $twitterData = $twitterConnection->get(
  'statuses/user_timeline',
  array(
    'screen_name'     => $accountname,   // Your Twitter Username
    'count'           => $no_tweets,    // Number of Tweets to display
    'exclude_replies' => true
  )
  );    
  if($twitterData && is_array($twitterData)) {
  ?>
  <ul id="Home_tweets_list" class="feed_list">
    <?php foreach($twitterData as $tweet): ?>
      <li class="twittwit">
        <div class="twat-twat">
          <p>
            <?php
              $latestTweet = $tweet->text;
              $latestTweet = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $latestTweet);
              echo $latestTweet;
            ?>
          </p>
          <?php
            $twitterTime = strtotime($tweet->created_at);
            $timeAgo = ago($twitterTime);
          ?>
          <div class="meta">
            <a href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/statuses/<?php echo $tweet->id_str; ?>" class="jtwt_date"><span>@<?php echo $tweet->user->screen_name; ?> | <?php echo $timeAgo; ?></a>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
  <?php
  }
}