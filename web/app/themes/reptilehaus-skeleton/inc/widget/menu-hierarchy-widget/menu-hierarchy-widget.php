<?php

// Block direct requests
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* REPTILEHAUS Register Sidebar Tags */
function reptilehaus_loadHierarchySideMenu() {
  register_widget( 'REPTILEHAUS_sidebarHierarchicalMenu' );
}
add_action( 'widgets_init', 'reptilehaus_loadHierarchySideMenu' );


class REPTILEHAUS_sidebarHierarchicalMenu extends WP_Widget {

	function __construct() {
		parent::__construct(
                'sidebarhierarchymenu', __('Sidebar Hierarhical Menu Widget', 'reptilehaus_hierarchy_sidebar_menu'),
                array( 'description' => __( 'Displays links relating to parent pages in the sidebar', 'reptilehaus_hierarchy_sidebar_menu' ),
                ));
	}


    public function widgetOutput($title=""){
		global $post; 
		$site = site_url();
		$output .= '<div class="quick-tags"><ul class="tag-block brand-secondary list-reset">';
		if ( is_page() && !$post->post_parent ){

			$link = get_the_permalink();
			$tit  = get_the_title();
			$output .= '<li class="current_page_item"><a href="' . $link . '">' . $tit . '</a></li>';
			$pages = get_pages( array ('parent'  => $post->ID ));
			foreach ($pages as $page) {
				$the_parent = get_post( $page->post_parent )->post_name;
				$the_slug   = get_post( $page )->post_name;
				$output .= '<li><a href="' . site_url() . "/" . $the_parent . "/" . $the_slug . '">' . $page->post_title . '</a></li>';
			}
		}
		// if ( $childpages ) { 
		// $output .= $childpages;
		// }
		$output .= '</ul></div>';
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
			$title = __( 'Main', 'reptilehaus_hierarchy_sidebar_menu' );
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