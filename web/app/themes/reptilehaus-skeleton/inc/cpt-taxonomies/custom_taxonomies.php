<?php


add_action( 'init', 'LMD_CUSTOM_TAXONOMIES', 0 );
function LMD_CUSTOM_TAXONOMIES() {

/* TAX 1  */
  $labelsA = array(
    'name'                => _x( 'TAX 1', 'taxonomy general name' ),
    'singular_name'       => _x( 'TAX 1', 'taxonomy singular name' ),
    'search_items'        => __( 'Search TAX 1' ),
    'all_items'           => __( 'All TAX 1' ),
    'parent_item'         => __( 'Parent TAX 1' ),
    'parent_item_colon'   => __( 'Parent TAX 1:' ),
    'edit_item'           => __( 'Edit TAX 1' ),
    'update_item'         => __( 'Update TAX 1' ),
    'add_new_item'        => __( 'Add New TAX 1' ),
    'new_item_name'       => __( 'New TAX 1 Name' ),
    'menu_name'           => __( 'TAX 1' ),
  );

  $argsA = array(
    'hierarchical'        => true, // Tags if its false
    'labels'              => $labelsA,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'tax-1' ),
  );

/* TAX 2 */
  $labelsB = array(
    'name'                => _x( 'TAX 2', 'taxonomy general name' ),
    'singular_name'       => _x( 'TAX 2', 'taxonomy singular name' ),
    'search_items'        => __( 'Search TAX 2' ),
    'all_items'           => __( 'All TAX 2' ),
    'parent_item'         => __( 'Parent TAX 2' ),
    'parent_item_colon'   => __( 'Parent TAX 2:' ),
    'edit_item'           => __( 'Edit TAX 2' ),
    'update_item'         => __( 'Update TAX 2' ),
    'add_new_item'        => __( 'Add New TAX 2' ),
    'new_item_name'       => __( 'New TAX 2 Name' ),
    'menu_name'           => __( 'TAX 2' ),
  );

  $argsB = array(
    'hierarchical'        => true, // Tags if its false
    'labels'              => $labelsB,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'tax-2' ),
  );

  /* TAX 3 */
  $labelsC = array(
    'name'                => _x( 'TAX 3', 'taxonomy general name' ),
    'singular_name'       => _x( 'TAX 3', 'taxonomy singular name' ),
    'search_items'        => __( 'Search TAX 3' ),
    'all_items'           => __( 'All TAX 3' ),
    'parent_item'         => __( 'Parent TAX 3' ),
    'parent_item_colon'   => __( 'Parent TAX 3:' ),
    'edit_item'           => __( 'Edit TAX 3' ),
    'update_item'         => __( 'Update TAX 3' ),
    'add_new_item'        => __( 'Add New TAX 3' ),
    'new_item_name'       => __( 'New TAX 3 Name' ),
    'menu_name'           => __( 'TAX 3' ),
  );

  $argsC = array(
    'hierarchical'        => true, // Tags if its false
    'labels'              => $labelsC,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'query_var'           => true,
    'rewrite'             => array( 'slug' => 'tax-3' ),
  );

    register_taxonomy( 'tax-1', array( 'cpt-2' ), $argsA );
    register_taxonomy( 'tax-2', array( 'cpt-1' ), $argsB );
    register_taxonomy( 'tax-3', array( 'cpt-1' ), $argsC );
}