<?php

function my_mce4_options($init) {
  $default_colours = '"000000", "Black",
                      "993300", "Burnt orange",
                      "333300", "Dark olive",
                      "003300", "Dark green",
                      "003366", "Dark azure",
                      "000080", "Navy Blue",
                      "333399", "Indigo",
                      "333333", "Very dark gray",
                      "800000", "Maroon",
                      "FF6600", "Orange",
                      "808000", "Olive",
                      "008000", "Green",
                      "008080", "Teal",
                      "0000FF", "Blue",
                      "666699", "Grayish blue",
                      "808080", "Gray",
                      "FF0000", "Red",
                      "FF9900", "Amber",
                      "99CC00", "Yellow green",
                      "339966", "Sea green",
                      "33CCCC", "Turquoise",
                      "3366FF", "Royal blue",
                      "800080", "Purple",
                      "999999", "Medium gray",
                      "FF00FF", "Magenta",
                      "FFCC00", "Gold",
                      "FFFF00", "Yellow",
                      "00FF00", "Lime",
                      "00FFFF", "Aqua",
                      "00CCFF", "Sky blue",
                      "993366", "Red violet",
                      "FFFFFF", "White",
                      "FF99CC", "Pink",
                      "FFCC99", "Peach",
                      "FFFF99", "Light yellow",
                      "CCFFCC", "Pale green",
                      "CCFFFF", "Pale cyan",
                      "99CCFF", "Light sky blue",
                      "CC99FF", "Plum"';

  $custom_colours =  '"e84a37", "NEW RED"';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

  // enable 6th row for custom colours in grid
  $init['textcolor_rows'] = 6;

  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');





//* Add custom styles to the Styles drop down menu in the TinyMCE Editor
//* @link http://anythinggraphic.net/custom-styles-in-wordpress-editor
function themeit_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'themeit_mce_buttons_2' );

function themeit_tiny_mce_before_init( $settings ) {
	$style_formats = array(
		array( 'title' => 'Article Intro Text', 'inline' => 'span', 'classes' => 'c-post--introtxt' ),
	);
	$settings['style_formats'] = json_encode( $style_formats );
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'themeit_tiny_mce_before_init' );









// Custom Shortcode - Will add a block of html around whatever is encloses
function openColumn() {
    return '<div class="c-blog_item--inline__shortcode"><div class="c-table"><div class="c-table--row"><div class="c-table--cell c-post-data">';
}
add_shortcode('column-open', 'openColumn');


function closeColumn() {
    return '</div></div></div></div>';
}
add_shortcode('column-close', 'closeColumn');