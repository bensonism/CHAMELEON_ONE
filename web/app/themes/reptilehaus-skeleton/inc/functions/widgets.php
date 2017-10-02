<?php

if ( function_exists('register_sidebar') ) {

   register_sidebar(array(
   'name' => 'Olark Chat',
   'id' => 'olark_chat',
   'before_widget' => '<div id="%1$s" class="widget %2$s">',
   'after_widget' => '</div>',
   'before_title' => '<h2 class="rounded">',
   'after_title' => '</h2>'
    ));

   register_sidebar(array(
   'name' => 'Footer One',
   'id' => 'footer_one',
   'before_widget' => '<div id="%1$s" class="widget %2$s">',
   'after_widget' => '</div>',
   'before_title' => '<h2 class="rounded">',
   'after_title' => '</h2>'
   ));
   register_sidebar(array(
   'name' => 'Footer Two',
   'id' => 'footer_two',
   'before_widget' => '<div id="%1$s" class="widget %2$s">',
   'after_widget' => '</div>',
   'before_title' => '<h2 class="rounded">',
   'after_title' => '</h2>'
   ));
   register_sidebar(array(
   'name' => 'Footer Three',
   'id' => 'footer_three',
   'before_widget' => '<div id="%1$s" class="widget %2$s">',
   'after_widget' => '</div>',
   'before_title' => '<h2 class="rounded">',
   'after_title' => '</h2>'
   ));
}











// Creating the widget 
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpb_widget', 

// Widget name will appear in UI
__('WPBeginner Widget', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
echo __( 'Hello, World!', 'wpb_widget_domain' );
echo $args['after_widget'];
}
    
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
  
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
  register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );













function wpshout_register_widgets() {
	register_widget( 'ContactForm7_Widget');
}

add_action( 'widgets_init', 'wpshout_register_widgets' );

class ContactForm7_Widget extends WP_Widget {

	function ContactForm7_Widget() {
		// Instantiate the parent object
		parent::__construct(
	            'ContactForm7_Widget', // Base ID
        	    __('Laughter Lounge Subscribe Widget', 'text_domain'), // Name
 	           array( 'description' => __( 'Adds a subscription form to a widgetised area', 'text_domain' ), ) // Args
		);
	}

	function widget( $args, $instance ) {
		echo $args['before_widget']; 
		echo '<h2>' . $instance['link'] . '</h2>';
		echo do_shortcode($instance['songinfo']);
		echo $args['after_widget'];
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['link'] = strip_tags($new_instance['link']);
		$instance['songinfo'] = strip_tags($new_instance['songinfo']);
		return $instance;
	}

	// Widget form creation
	function form($instance) {
	 	$link = '';
		$songinfo = '';

		// Check values
		if( $instance) {
			$link = esc_attr($instance['link']);
			$songinfo = esc_textarea($instance['songinfo']);
		} ?>
		 
		<p>
			<label for="<?php echo $this->get_field_id('link'); ?>"><?php _e('Link', 'wp_widget_plugin'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" />
		</p>
		 
		<p>
			<label for="<?php echo $this->get_field_id('songinfo'); ?>"><?php _e('Song Info:', 'wp_widget_plugin'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('songinfo'); ?>" name="<?php echo $this->get_field_name('songinfo'); ?>" type="text" value="<?php echo $songinfo; ?>" />
		</p>
		
	<?php }
}
