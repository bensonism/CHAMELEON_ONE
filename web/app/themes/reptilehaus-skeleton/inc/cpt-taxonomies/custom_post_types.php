<?php


add_action( 'init', 'LMD_CUSTOM_POST_TYPES' );
function LMD_CUSTOM_POST_TYPES() {
  
  /* TUTORIALS CPT */
  $labelsA = array(
    'name'               => _x('CPT 1', 'post type general name'),
    'singular_name'      => _x('CPT 1', 'post type singular name'),
    'add_new'            => _x('Add New', 'CPT 1'),
    'add_new_item'       => __('Add New CPT 1'),
    'edit_item'          => __('Edit CPT 1'),
    'new_item'           => __('New CPT 1'),
    'all_items'          => __('All CPT 1s'),
    'view_item'          => __('View CPT 1'),
    'search_items'       => __('Search CPT 1'),
    'not_found'          => __('No CPT 1 found'),
    'not_found_in_trash' => __('No CPT 1 found in Trash'),
    'parent_item_colon'  => '',
    'menu_name'          => __('CPT 1')
  );
  $argsA = array(
    'labels'              => $labelsA,
    'menu_icon'           => 'dashicons-admin-site',
    'taxonomies'          => array('tutorial-categories', 'post_tag'),
    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'cpt-1' ),
    'exclude_from_search' => true,
    'capability_type'     => 'post',
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array( 'title', 'editor','thumbnail', 'revisions' )
  );

  /* PROJECTS CPT */
  $labelsB = array(
    'name'               => _x('CPT 2', 'post type general name'),
    'singular_name'      => _x('CPT 2', 'post type singular name'),
    'add_new'            => _x('Add New', 'CPT 2'),
    'add_new_item'       => __('Add New CPT 2'),
    'edit_item'          => __('Edit CPT 2'),
    'new_item'           => __('New CPT 2'),
    'all_items'          => __('All CPT 2s'),
    'view_item'          => __('View CPT 2'),
    'search_items'       => __('Search CPT 2'),
    'not_found'          => __('No CPT 2 found'),
    'not_found_in_trash' => __('No CPT 2 found in Trash'),
    'parent_item_colon'  => '',
    'menu_name'          => __('CPT 2')
  );
  $argsB = array(
    'labels'              => $labelsB,
    'menu_icon'           => 'dashicons-analytics',
    'taxonomies'          => array('project-categories', 'project-settings', 'post_tag'),
    'public'              => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'query_var'           => true,
    'rewrite'             => true,
    'exclude_from_search' => true,
    'capability_type'     => 'post',
    'has_archive'         => false,
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' )
  );


  register_post_type('cpt-1',$argsA);
  register_post_type('cpt-2',$argsB);
  flush_rewrite_rules();
}
