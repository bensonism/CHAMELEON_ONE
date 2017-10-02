<?php

// Block direct requests
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* REPTILEHAUS Register Sidebar search */
function reptilehaus_loadsearchWidget() {
  register_widget( 'REPTILEHAUS_sidebar_search' );
}
add_action( 'widgets_init', 'reptilehaus_loadsearchWidget' );


class REPTILEHAUS_sidebar_search extends WP_Widget {

	function __construct() {
		parent::__construct(
                'sidebarsearch', __('Sidebar Search Widget', 'reptilehaus_sidebar_search'),
                array( 'description' => __( 'Sidebar Search', 'reptilehaus_sidebar_search' ),
                ));
	}




	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		if ( ! empty( $title ) )
        echo get_search_form();
        echo "test";
		echo $args['after_widget'];
	}
		

}