<?php
/**
 * @desc Useful extras and custom functions
 * @link https://codex.wordpress.org/Function_Reference/
 */

/**
 * @desc Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 */

function wpdocs_excerpt_more( $more ) {

	return sprintf( '%2$s',

		get_permalink( get_the_ID() ),

		__( '...', 'wppt' )

	);
}

/**
 * @desc Get the excerpt and specify character limit
 * usage: get_excerpt(140);
 */


function get_excerpt($limit, $source = null){

    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    return $excerpt;
}

/**
 * @desc Add pagination bar, and include custom post types if needed
 */

function pagination_bar( $loop ) {

	$total_pages = $loop->max_num_pages;

	if ( $total_pages > 1 ) {
		$current_page = max( 1, get_query_var( 'paged' ) );

		echo paginate_links( [
			'base'    => get_pagenum_link( 1 ) . '%_%',
			'format'  => 'page/%#%',
			'current' => $current_page,
			'total'   => $total_pages,
		] );
	}
}

function add_custom_types( $query ) {

	$post_types = get_post_types();

	if ( is_tag() && $query->is_main_query() || $query->is_author() ) {

		$query->set( 'post_type', $post_types );

	}
}

add_filter( 'pre_get_posts', 'add_custom_types' );

/**
 * @desc Disable annoying responsive post images
 */
add_filter('xmlrpc_enabled', '__return_false');
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
    add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
    add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
    add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
    function remove_thumbnail_dimensions( $html ) {
            $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
            return $html;
    }