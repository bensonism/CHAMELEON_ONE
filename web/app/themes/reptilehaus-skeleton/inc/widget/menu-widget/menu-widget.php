<?php

// Block direct requests
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* REPTILEHAUS Register Sidebar Tags */
function reptilehaus_loadSideMenu() {
  register_widget( 'REPTILEHAUS_sidebarMenu' );
}
add_action( 'widgets_init', 'reptilehaus_loadSideMenu' );


class REPTILEHAUS_sidebarMenu extends WP_Widget {

	function __construct() {
		parent::__construct(
                'sidebarmenu', __('Sidebar Menu Widget', 'reptilehaus_sidebar_menu'),
                array( 'description' => __( 'Mirrors the main navigation bars links', 'reptilehaus_sidebar_menu' ),
                ));
	}


    public function widgetOutput($title=""){

		$site = site_url();
		$menu_object = wp_get_nav_menu_items( esc_attr("Main") );
		$menu_items  = wp_list_pluck( $menu_object, 'object_id' );	
		$output .= '<div class="quick-tags">
			<ul class="tag-block brand-secondary list-reset">';
					foreach ($menu_items as $post_id ) {
						$post = get_post($post_id); 
						$output .=  '<li><a href="' . $site . "/" . $post->post_name . '">' . $post->post_title . '</a></li>';
					}
			$output .= '</ul>
		</div>';

		echo $output;
	

    }


	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );    
		echo $args['before_widget'];
		if ( ! empty( $title ) )
        echo $this->widgetOutput($title);
		echo $args['after_widget'];
	}
		
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'Main', 'reptilehaus_sidebar_menu' );
		}    
        ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		// $instance['subs'] = ( ! empty( $new_instance['subs'] ) ) ? strip_tags( $new_instance['subs'] ) : '';        
		return $instance;
	}
}