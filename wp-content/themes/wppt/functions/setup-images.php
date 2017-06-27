<?php
/**
 * Image Size wordpress documentation on function use:
 * @link https://developer.wordpress.org/reference/functions/add_image_size/
 */


function image_sizes() {
	add_image_size( 'background', 1500 );
	add_image_size( 'slider-image' , 400 ,400, true );
	add_image_size( 'banner', 2000 , 900 ,true );
}
add_action( 'after_setup_theme', 'image_sizes' );