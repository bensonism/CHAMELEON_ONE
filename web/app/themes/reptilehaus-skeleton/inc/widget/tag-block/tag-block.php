<?php

// Block direct requests
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* REPTILEHAUS Register Sidebar Tags */
function reptilehaus_loadTagsWidget() {
  register_widget( 'REPTILEHAUS_sidebar_tags' );
}
add_action( 'widgets_init', 'reptilehaus_loadTagsWidget' );


class REPTILEHAUS_sidebar_tags extends WP_Widget {

	function __construct() {
		parent::__construct(
                'sidebartags', __('Sidebar Tags Widget', 'reptilehaus_sidebar_tags'),
                array( 'description' => __( 'Sidebar Tag List', 'reptilehaus_sidebar_tags' ),
                ));
	}


    public function widgetOutput($title=""){
        echo '<div class="quick-tags">
            <h6 class="small-text-a brand-secondary-color upper">';
                echo $title;
            echo '</h6>
            <ul class="tag-block brand-secondary list-reset">';

                $args = array(
                    'taxonomy'     => 'recipe-categories',
                    'orderby'      => 'name',
                    'show_count'   => 0,
                    'pad_counts'   => 0,
                    'hierarchical' => 1,
                    'title_li'     => '',
                    'hide_empty'   => 0
                );
                    wp_list_categories( $args ); 

            echo '</ul>
        </div>';
    }


	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		// echo $args['before_title'] . $title . $args['after_title'];
        echo $this->widgetOutput($title);
		// echo __( 'Hello, World!', 'reptilehaus_sidebar_tags' );
		echo $args['after_widget'];
	}
		
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'FILTER RECIPES BY', 'reptilehaus_sidebar_tags' );
		}	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}