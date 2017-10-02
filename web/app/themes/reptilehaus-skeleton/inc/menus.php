<?php

function register_my_menus() {
  register_nav_menus(
    array(
      'Main'            => __( 'Main' ),
      'Footer-A'        => __( 'Footer-A' ),  
      'Footer-B'        => __( 'Footer-B' ),         
      'Footer-C'        => __( 'Footer-C' ), 
      'Footer-Language' => __( 'Footer-Language' ),              
    )
  );
}
add_action( 'init', 'register_my_menus' );




function menu_nav() {
  wp_nav_menu(
    array(
      'theme_location'  => 'Main',
      'menu'            => '',
      'container'       => '',
      'container_class' => 'menu-{menu slug}-container',
      'container_id'    => '',
      'menu_class'      => '',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul class="list-reset u-main-nav">%3$s</ul>',
      'depth'           => 0,
      'walker'          => ''
    ) 
  );
}


function footer_a_nav() {
  wp_nav_menu(
    array(
      'theme_location'  => 'Footer-A',
      'menu'            => '',
      'container'       => '',
      'container_class' => 'menu-{menu slug}-container',
      'container_id'    => '',
      'menu_class'      => '',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul class="list-reset">%3$s</ul>',
      'depth'           => 0,
      'walker'          => ''
    ) 
  );
}



function footer_b_nav() {
  wp_nav_menu(
    array(
      'theme_location'  => 'Footer-B',
      'menu'            => '',
      'container'       => '',
      'container_class' => 'menu-{menu slug}-container',
      'container_id'    => '',
      'menu_class'      => '',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul class="list-reset">%3$s</ul>',
      'depth'           => 0,
      'walker'          => ''
    ) 
  );
}



function footer_c_nav() {
  wp_nav_menu(
    array(
      'theme_location'  => 'Footer-C',
      'menu'            => '',
      'container'       => '',
      'container_class' => 'menu-{menu slug}-container',
      'container_id'    => '',
      'menu_class'      => '',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul class="list-reset">%3$s</ul>',
      'depth'           => 0,
      'walker'          => ''
    ) 
  );
}




function footer_language_nav() {
  wp_nav_menu(
    array(
      'theme_location'  => 'Footer-Language',
      'menu'            => '',
      'container'       => '',
      'container_class' => 'menu-{menu slug}-container',
      'container_id'    => '',
      'menu_class'      => '',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul class="list-reset">%3$s</ul>',
      'depth'           => 0,
      'walker'          => ''
    ) 
  );
}