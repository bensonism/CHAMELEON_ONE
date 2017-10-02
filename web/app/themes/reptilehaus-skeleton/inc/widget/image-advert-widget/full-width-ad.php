<?php

// Block direct requests
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Load the widget on widgets_init
function reptilehaus_load_fwimage_widget() {
	register_widget( 'REPTILEHAUS_FWADVERT_Widget' );
}
add_action( 'widgets_init', 'reptilehaus_load_fwimage_widget' );

/**
 * REPTILEHAUS_Image_Widget class
 **/
class REPTILEHAUS_FWADVERT_Widget extends WP_Widget {

	const VERSION = '1.0';

	const CUSTOM_IMAGE_SIZE_SLUG = 'reptilehaus_image_widget_custom';

	/* reptilehaus Image Widget constructor */
	public function __construct() {
		load_plugin_textdomain( 'image-widget', false, trailingslashit( basename( dirname( __FILE__ ) ) ) . 'lang/' );
		$widget_ops = array( 'classname' => 'c-fw-advert', 'description' => __( 'Advert or Image Widget with a Title, URL, and a Description', 'image-widget' ) );
		$control_ops = array( 'id_base' => 'c-fw-advert' );
		parent::__construct( 'c-fw-advert', __( 'FW Advert Widget', 'image-widget' ), $widget_ops, $control_ops );
		add_action( 'sidebar_admin_setup', array( $this, 'admin_setup' ) );
		add_action( 'admin_head-widgets.php', array( $this, 'admin_head' ) );
	}


	public function admin_setup() {
		wp_enqueue_media();
		wp_enqueue_script( 'reptilehaus-image-widget', get_template_directory_uri() . '/inc/widget/image-advert-widget/resources/js/image-widget.js', array( 'jquery', 'media-upload', 'media-views' ), self::VERSION );

		wp_localize_script( 'reptilehaus-image-widget', 'REPTILEHAUS', array(
			'frame_title' => __( 'Select an Image', 'image-widget' ),
			'button_title' => __( 'Insert Into Widget', 'image-widget' ),
		) );
	}

	/**	 * Widget frontend output */
	public function widget( $args, $instance ) {
		extract( $args );
		$instance = wp_parse_args( (array) $instance, self::get_defaults() );
		if ( ! empty( $instance['imageurl'] ) || ! empty( $instance['attachment_id'] ) ) {
			$instance['title']       = apply_filters( 'widget_title', empty( $instance['title'] ) ? '': $instance['title'] );
			$instance['description'] = apply_filters( 'widget_text', $instance['description'], $args, $instance );
			$instance['link']        = apply_filters( 'image_widget_image_link', esc_url( $instance['link'] ), $args, $instance );
			$instance['linkid']      = apply_filters( 'image_widget_image_link_id', esc_attr( $instance['linkid'] ), $args, $instance );
			$instance['linktarget']  = apply_filters( 'image_widget_image_link_target', esc_attr( $instance['linktarget'] ), $args, $instance );
			$instance['width']       = apply_filters( 'image_widget_image_width', abs( $instance['width'] ), $args, $instance );
			$instance['height']      = apply_filters( 'image_widget_image_height', abs( $instance['height'] ), $args, $instance );
			$instance['maxwidth']    = apply_filters( 'image_widget_image_maxwidth', esc_attr( $instance['maxwidth'] ), $args, $instance );
			$instance['maxheight']   = apply_filters( 'image_widget_image_maxheight', esc_attr( $instance['maxheight'] ), $args, $instance );
			$instance['align']       = apply_filters( 'image_widget_image_align', esc_attr( $instance['align'] ), $args, $instance );
			$instance['alt']         = apply_filters( 'image_widget_image_alt', esc_attr( $instance['alt'] ), $args, $instance );
			$instance['rel']         = apply_filters( 'image_widget_image_rel', esc_attr( $instance['rel'] ), $args, $instance );
			$instance['imageurl']    = apply_filters( 'image_widget_image_url', esc_url( $instance['imageurl'] ), $args, $instance );
			extract( $instance ); 			// No longer using extracted vars. This is here for backwards compatibility.
			include( $this->getTemplateHierarchy( 'widget' ) );
		}
	}

	/**	 * Update widget options */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, self::get_defaults() );
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['description'] = $new_instance['description'];
		} else {
			$instance['description'] = wp_filter_post_kses( $new_instance['description'] );
		}
		$instance['link']         = $new_instance['link'];
		$instance['linkid']       = $new_instance['linkid'];
		$instance['linktarget']   = $new_instance['linktarget'];
		$instance['width']        = abs( $new_instance['width'] );
		$instance['height']       = abs( $new_instance['height'] );
		$instance['align']        = $new_instance['align'];
		$instance['alt']          = $new_instance['alt'];
		$instance['rel']          = $new_instance['rel'];
		$instance['imageurl']     = $new_instance['imageurl']; // deprecated
		$instance['aspect_ratio'] = $this->get_image_aspect_ratio( $instance );
		return $instance;
	}

	/*  Form UI */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, self::get_defaults() );
			include( $this->getTemplateHierarchy( 'widget-admin' ) );
	}

	/*  Admin header css  */
	public function admin_head() {
		?>
	<style type="text/css">
		.uploader input.button {
			width: 100%;
			height: 34px;
			line-height: 33px;
			margin-top: 15px;
		}
		.reptilehaus_preview .aligncenter {
			display: block;
			margin-left: auto !important;
			margin-right: auto !important;
		}
		.reptilehaus_preview {
			overflow: hidden;
			max-height: 300px;
		}
		.reptilehaus_preview img {
			margin: 10px 0;
			height: auto;
		}


		.uploader input.button.reptilehaus-btn {
			width: 100%!important;
			height: auto;
			line-height: 45px!important;
			margin: 15px auto!important;
			background-color: #10cfbd;
			color: white!important;
			font-size: 20px;
			border: 0!important;
			text-transform: uppercase!important;
		}



	</style>
	<?php
	}

	/*  Render an array of default values. */
	private static function get_defaults() {
		$defaults = array(
			'title'       => '',
			'description' => '',
			'link'        => '',
			'linkid'      => '',
			'linktarget'  => '',
			'width'       => 0,
			'height'      => 0,
			'maxwidth'    => '100%',
			'maxheight'   => '',
			'image'       => 0, // reverse compatible - now attachement_id
			'imageurl'    => '', // reverse compatible.
			'align'       => 'none',
			'alt'         => '',
			'rel'         => '',
		);
		return $defaults;
	}

	/*  Render the image html output.  */
	private function get_image_html( $instance, $include_link = true ) {
		// Backwards compatible image display.
		if ( $instance['attachment_id'] == 0 && $instance['image'] > 0 ) {
			$instance['attachment_id'] = $instance['image'];
		}
		$output = '';
		if ( $include_link && ! empty( $instance['link'] ) ) {
			$attr = array(
				'href'   => $instance['link'],
				'target' => "_blank",
				'class'  => 'c-advert-wide__link',
				'title'  => ( ! empty( $instance['alt'] ) ) ? $instance['alt']: $instance['title'],
				'rel'    => $instance['rel'],
			);
			$attr   = apply_filters( 'image_widget_link_attributes', $attr, $instance );
			$attr   = array_map( 'esc_attr', $attr );
			$output = '<a';
			foreach ( $attr as $name => $value ) {
				$output .= sprintf( ' %s="%s"', $name, $value );
			}
			$output .= '>';
		}

        if ( ! empty( $instance['attachment_id'] ) ) {
			$image_details = wp_get_attachment_image_src( $instance['attachment_id'], $size );
			if ( $image_details ) {
				$instance['imageurl'] = $image_details[0];
				$instance['width'] = $image_details[1];
				$instance['height'] = $image_details[2];
			}
		}

		$attr = apply_filters( 'image_widget_image_attributes', $attr, $instance );

		if ( ! empty( $instance['imageurl'] ) ) {
	        global $wpdb;
	        $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $instance['imageurl'] )); 
            $propersizeImage = wp_get_attachment_image_src( $attachment[0], 'home-fw-advert' );
			$output     .=  '<div class="c-advert-wide__item"  data-id="' . $attachment[0] . '" style="background:url(' . $propersizeImage[0] . ') no-repeat; background-size:cover; background-position:center center;"></div>';
		} 
		if ( $include_link && ! empty( $instance['link'] ) ) {
			$output .= '</a>';
		}

		return $output;
	}

	/*  Get all possible image sizes to choose from */
	private function possible_image_sizes() {
		$registered = get_intermediate_image_sizes();
		$registered = array_combine( $registered, $registered );
		return (array) apply_filters( 'image_size_names_choose', $registered );
	}

	/*  Assesses the image size in case it has not been set or in case there is a mismatch. */
	private function get_image_size( $instance ) {
		if ( ! empty( $instance['size'] ) && $instance['size'] != self::CUSTOM_IMAGE_SIZE_SLUG ) {
			$size = $instance['size'];
		} elseif ( isset( $instance['width'] ) && is_numeric( $instance['width'] ) && isset( $instance['height'] ) && is_numeric( $instance['height'] ) ) {
			//$size = array(abs($instance['width']),abs($instance['height']));
			$size = array( $instance['width'], $instance['height'] );
		} else {
			$size = 'full';
		}
		return $size;
	}

	/**	 * Establish the aspect ratio of the image.	 */
	private function get_image_aspect_ratio( $instance ) {
		if ( ! empty( $instance['aspect_ratio'] ) ) {
			return abs( $instance['aspect_ratio'] );
		} else {
			$attachment_id = ( ! empty( $instance['attachment_id'] ) ) ? $instance['attachment_id'] : $instance['image'];
			if ( ! empty( $attachment_id ) ) {
				$image_details = wp_get_attachment_image_src( $attachment_id, 'full' );
				if ( $image_details ) {
					return ( $image_details[1] / $image_details[2] );
				}
			}
		}
	}

	public function getTemplateHierarchy( $template ) {
		// whether or not .php was added
		$template_slug = rtrim( $template, '.php' );
		$template = $template_slug . '.php';

		if ( $theme_file = locate_template( array( 'image-widget/' . $template ) ) ) {
			$file = $theme_file;
		} else {
			$file = 'views/' . $template;
		}
		return apply_filters( 'sp_template_image-widget_' . $template, $file );
	}


}
