<?php

function reptilehaus_init_widgets() {

	register_sidebar( array(
		'name'            => __( 'Sidebar Widget Area', 'REPTILEHAUS' ),
		'id'              => 'c-sidebar-main',
		'description'     => __( 'Main Global Sidebar', 'REPTILEHAUS' ),
		'before_widget'   => '<aside id="%1$s" class="c-sidebar__widget  %2$s">',
		'after_widget'    => '</aside>',
		// 'before_title' => '<h3 class="widget-title">',
		// 'after_title'  => '</h3>',
	) );

	register_sidebar( array(
		'name'            => __( 'Footer Widget Area', 'REPTILEHAUS' ),
		'id'              => 'c-footer-widget',
		'description'     => __( 'Global Footer Widget', 'REPTILEHAUS' ),
		'before_widget'   => '<section id="%1$s" class="o-footer-widget %2$s">',
		'after_widget'    => '</section>',
		// 'before_title' => '<h3 class="widget-title">',
		// 'after_title'  => '</h3>',
	) );

	}

add_action( 'widgets_init', 'reptilehaus_init_widgets' );