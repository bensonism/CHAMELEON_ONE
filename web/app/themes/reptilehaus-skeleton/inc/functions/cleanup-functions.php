<?php

// remove WP3.1 admin bar
//add_filter('show_admin_bar', '__return_false');


// remove underused items from dashboard menu
function remove_menus () {
  global $menu;
  $restricted = array( __('Links'), __('Comments'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
  }
}
add_action('admin_menu', 'remove_menus');



// remove updatenag
add_action('admin_menu','wp_hide_update');
function wp_hide_update() {
  remove_action( 'admin_notices', 'update_nag', 3 );
}
// Make search url friendly: http://wpengineer.com/2258/change-the-search-url-of-wordpress/
function change_search_url_rewrite() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }   
}
add_action( 'template_redirect', 'change_search_url_rewrite' );
// add browser detection to body_class();
// from: http://wpsnipp.com/index.php/functions-php/browser-detection-and-os-detection-with-body_class/
function mv_browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE) {
        $classes[] = 'ie';
        if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
        $classes[] = 'ie'.$browser_version[1];
    } else $classes[] = 'unknown';
    if($is_iphone) $classes[] = 'iphone';
    if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
        $classes[] = 'osx';
    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
        $classes[] = 'linux';
    } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
        $classes[] = 'windows';
    }
    return $classes;
}
add_filter('body_class','mv_browser_body_class');
// remove theme and plugin editor
// define('DISALLOW_FILE_EDIT', true);
// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
// from 4.2 remove emoji support
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles' );




function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        //remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
        remove_action('welcome_panel', 'wp_welcome_panel');
}
add_action( 'admin_init', 'remove_dashboard_meta' );



// Disable RSS feeds: http://wpengineer.com/287/disable-wordpress-feed/
function fb_disable_feed() {
    wp_die( __('No feed available.') );
}
add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'fb_disable_feed', 1);
add_action('do_feed_atom_comments', 'fb_disable_feed', 1);


// remove WP version from RSS
function bones_rss_version() { return ''; }
// remove WP version from scripts
function bones_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}






// remove injected CSS for recent comments widget
function bones_remove_wp_widget_recent_comments_style() {
  if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
    remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
  }
}
// remove injected CSS from recent comments widget
function bones_remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
  }
}


  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );
  /*
   * Enable support for Post Formats.
   * See https://developer.wordpress.org/themes/functionality/post-formats/
   */
  add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
  ) );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', '_s' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', '_s_widgets_init' );








/*
  Rebuild the image tag with only the stuff we want
  Credit: Brian Gottie
  Source: http://blog.skunkbad.com/wordpress/another-look-at-rebuilding-image-tags
*/
if ( ! class_exists( 'Foundationpress_img_rebuilder' ) ) :
  class Foundationpress_img_rebuilder {
    public $caption_class   = 'wp-caption';
    public $caption_p_class = 'wp-caption-text';
    public $caption_id_attr = false;
    public $caption_padding = 8; // Double of the padding on $caption_class
    public function __construct() {
      add_filter( 'img_caption_shortcode', array( $this, 'img_caption_shortcode' ), 1, 3 );
      add_filter( 'get_avatar', array( $this, 'recreate_img_tag' ) );
      add_filter( 'the_content', array( $this, 'the_content') );
    }
    public function recreate_img_tag( $tag ) {
        // Supress SimpleXML errors
        libxml_use_internal_errors( true );
        try {
            $x = new SimpleXMLElement( $tag );
            // We only want to rebuild img tags
            if ( $x->getName() == 'img' ) {
                // Get the attributes I'll use in the new tag
                $alt        = (string) $x->attributes()->alt;
                $src        = (string) $x->attributes()->src;
                $classes    = (string) $x->attributes()->class;
                $class_segs = explode(' ', $classes);
                // All images have a source
                $img = '<img src="' . $src . '"';
                // If alt not empty, add it
                if ( ! empty( $alt ) ) {
                  $img .= ' alt="' . $alt . '"';
                }
                // Filter Through Class Segments & Find Alignment Classes and Size Classes
                $filtered_classes = array();
                foreach ( $class_segs as $class_seg ) {
                    if ( substr( $class_seg, 0, 5 ) === 'align' || substr( $class_seg, 0, 4 ) === 'size' ) {
                        $filtered_classes[] = $class_seg;
                    }
                }
                // Add Rebuilt Classes and Close The Tag
                if ( count( $filtered_classes ) ) {
                    $img .= ' class="' . implode( $filtered_classes, ' ' ) . '" />';
                } else {
                    $img .= ' />';
                }
                return $img;
            }
        }
        catch ( Exception $e ) {
                if ( defined('WP_DEBUG') && WP_DEBUG ) {
                        if ( defined('WP_DEBUG_DISPLAY') && WP_DEBUG_DISPLAY ) {
                            echo 'Caught exception: ',  $e->getMessage(), "\n";
                        }
                }
            }
        // Tag not an img, so just return it untouched
        return $tag;
    }
    /**
     * Search post content for images to rebuild
     */
    public function the_content( $html ) {
      return preg_replace_callback(
        '|(<img[^>]*>)|',
        array( $this, 'the_content_callback' ),
        $html
      );
    }
    /**
     * Rebuild an image in post content
     */
    private function the_content_callback( $match ) {
      return $this->recreate_img_tag( $match[0] );
    }
    /**
     * Customize caption shortcode
     */
    public function img_caption_shortcode( $output, $attr, $content ) {
      // Not for feed
      if ( is_feed() ) {
        return $output;
      }
      // Set up shortcode atts
      $attr = shortcode_atts( array(
        'align'   => 'alignnone',
        'caption' => '',
        'width'   => '',
      ), $attr );
      // Add id and classes to caption
      $attributes = '';
      $caption_id_attr = '';
      if ( $caption_id_attr && ! empty( $attr['id'] ) ) {
        $attributes .= ' id="' . esc_attr( $attr['id'] ) . '"';
      }
      $attributes .= ' class="' . $this->caption_class . ' ' . esc_attr( $attr['align'] ) . '"';
      // Set the max-width of the caption
      $attributes .= ' style="max-width:' . ( $attr['width'] + $this->caption_padding ) . 'px;"';
      // Create caption HTML
      $output = '
        <div' . $attributes .'>' .
          do_shortcode( $content ) .
          '<p class="' . $this->caption_p_class . '">' . $attr['caption'] . '</p>' .
        '</div>
      ';
      return $output;
    }
  }
  $Foundationpress_img_rebuilder = new Foundationpress_img_rebuilder;
endif;
// Add WooCommerce support for wrappers per http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
add_action('woocommerce_before_main_content', 'foundationpress_before_content', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_after_main_content', 'foundationpress_after_content', 10);


