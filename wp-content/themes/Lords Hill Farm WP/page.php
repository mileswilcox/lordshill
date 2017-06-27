<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers HTML5 3.0
 */

get_header(); ?>

<?php if ( have_rows( 'main_layout' ) ) {

	while ( have_rows( 'main_layout' ) ) {

		the_row();

		include get_template_directory() . '/regions/' . get_row_layout() . '.php';

	}

}  ?>



<?php get_footer(); ?>
