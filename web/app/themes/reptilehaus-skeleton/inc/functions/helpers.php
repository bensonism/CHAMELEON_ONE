<?php 

/* Show Page Template */
add_action('wp_head', 'show_template');
function show_template() {
  global $template;
  $template = '<div id="page_template"><span>Template URL:</span> '.$template.'</div>';
  if ( is_super_admin() ) { print_r($template); }
}



function mytheme_add_favicon() {
  echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/favicon.ico" />';
}
add_action( 'wp_head', 'mytheme_add_favicon' );
add_action('admin_head', 'mytheme_add_favicon');



/*

Custom Login Page

*/







/* WP-ADMIN CUSTOM LOGIN LOGO LINK AND TOOLTIP */
function loginpage_custom_link() {
  return REPTILEHAUS_ADMIN_CUSTOM_SITE_LINK;
}
add_filter('login_headerurl','loginpage_custom_link');

//and this one will change the tooltip when you rollover the logo:
function change_title_on_logo() {
  return REPTILEHAUS_ADMIN_CUSTOM_LOGO_TITLE;
}
add_filter('login_headertitle', 'change_title_on_logo');
/* WP-ADMIN CUSTOM LOGIN LOGO LINK AND TOOLTIP */






/* Dont have media gallery liink to image as a default*/
function wpb_imagelink_setup() {
  $image_set = get_option( 'image_default_link_type' );
    if ($image_set !== 'none') {
    update_option('image_default_link_type', 'none');
  }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);



    
/* Remove Admin bar */
function remove_admin_bar() {  return false; }
        

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}
add_action('init', 'pagination');   







function short_excerpt( $chars ){
  $excerpt = get_the_content();
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $the_str = substr($excerpt, 0, $chars);
  return $the_str;
}

function short_title( $chars ){
  $excerpt = get_the_title();
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $the_str = substr($excerpt, 0, $chars);
  return $the_str;
}




    

    


/*

the followind defer javascript

*/


// Defer Javascripts
// Defer jQuery Parsing using the HTML5 defer property
/*if (!(is_admin() )) {
    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.min.js' ) ) return $url;
        // return "$url' defer ";
        return "$url' defer onload='";
    }
    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}


// Defer JS for Contact Form 7

! defined( 'ABSPATH' ) and exit;

if ( ! function_exists( 'add_defer_to_cf7' ) )
{
function add_defer_to_cf7( $url )
{
if ( // comment the following line out add 'defer' to all scripts
// FALSE === strpos( $url, 'contact-form-7' ) or
FALSE === strpos( $url, '.js' )
)
{ // not our file
return $url;
}
// Must be a ', not "!
return "$url' defer='defer";
}
add_filter( 'clean_url', 'add_defer_to_cf7', 11, 1 );
}*/




    



function stripe_transaction_history( $amount, $donation_fname, $donation_lname, $email, $goodie, $donation_cname, $token ){

/*

CREATE TABLE `AFeh45_stripe_History` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`donation_amount` INT(11),
`donation_fname` VARCHAR(120),
`donation_lname` VARCHAR(120),
`donation_email` VARCHAR(130),
`donation_address`  VARCHAR(255),
`card_name`  VARCHAR(255),
`stripeToken` VARCHAR(255),
`subscribe`  enum('0','1'),
`transaction_timestamp` TIMESTAMP
);

*/
    global $wpdb;
    $wpdb->insert($wpdb->prefix . "stripe_History", 
                            array('donation_amount'   => "$amount",
                                  'donation_fname' => "$donation_fname",
                                  'donation_lname' => "$donation_lname",
                                  'donation_email' => "$email",    
                                  'donation_address' => "$goodie",
                                  'card_name' => "$donation_cname",
                                  'subscribe' => "$subscriber",
                                  'stripeToken' => "$token"   
                                 ));

   
}







/* GET AND SET THE NUMBER OF TIMES A POST IS VIEWED */
/* the function is set in the single portfolio page and it it gotten in each meta area on the main portfolio page */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}



function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}





// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 
/* GET AND SET THE NUMBER OF TIMES A POST IS VIEWED END */






// Remove query string from static files
function remove_cssjs_ver( $src ) {
 if( strpos( $src, '?ver=' ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );













/**
 * Dimox Breadcrumbs
 * http://dimox.net/wordpress-breadcrumbs-without-a-plugin/
 * Since ver 1.0
 * Add this to any template file by calling dimox_breadcrumbs()
 * Changes: MC added taxonomy support
 */
function dimox_breadcrumbs(){
  /* === OPTIONS === */
  $text['home']     = 'Home'; // text for the 'Home' link
  $text['category'] = 'Archive by Category "%s"'; // text for a category page
  $text['tax']    = 'Archive for "%s"'; // text for a taxonomy page
  $text['search']   = 'Search Results for "%s" Query'; // text for a search results page
  $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
  $text['author']   = 'Articles Posted by %s'; // text for an author page
  $text['404']      = 'Error 404'; // text for the 404 page
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter   = ' &raquo; '; // delimiter between crumbs
  $before      = '<span class="current">'; // tag before the current crumb
  $after       = '</span>'; // tag after the current crumb
  /* === END OF OPTIONS === */
  global $post;
  $homeLink = get_bloginfo('url') . '/';
  $linkBefore = '<span typeof="v:Breadcrumb">';
  $linkAfter = '</span>';
  $linkAttr = ' rel="v:url" property="v:title"';
  $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
  if (is_home() || is_front_page()) {
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';
  } else {
    echo '<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
    
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) {
        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
        echo $cats;
      }
      echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
    } elseif( is_tax() ){
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) {
        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
        echo $cats;
      }
      echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;
    
    }elseif ( is_search() ) {
      echo $before . sprintf($text['search'], get_search_query()) . $after;
    } elseif ( is_day() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
      echo $before . get_the_time('d') . $after;
    } elseif ( is_month() ) {
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
      echo $before . get_the_time('F') . $after;
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $delimiter);
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      $cats = get_category_parents($cat, TRUE, $delimiter);
      $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
      $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
      echo $cats;
      printf($link, get_permalink($parent), $parent->post_title);
      if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo $delimiter;
      }
      if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
    } elseif ( is_tag() ) {
      echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
    } elseif ( is_author() ) {
      global $author;
      $userdata = get_userdata($author);
      echo $before . sprintf($text['author'], $userdata->display_name) . $after;
    } elseif ( is_404() ) {
      echo $before . $text['404'] . $after;
    }
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</div>';
  }
} // end dimox_breadcrumbs()