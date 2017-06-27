<?php
/**
 * Custom Posts wordpress documentation on function use:
 * @link https://codex.wordpress.org/Post_Types
 */

function create_post_type() {
    register_post_type( 'testimonials',
        array(
            'labels' => array(
              'name' => __( 'Testimonials' ),
              'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => false,
            'taxonomies' => array('testimonials', 'post_tag'),
            'show_in_rest' => true,
            'rest_base'          => 'testimonials',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'rewrite' => array('slug' => 'testimonials', 'with_front' => false),
        )
    );

    register_post_type( 'clients',
        array(
            'labels' => array(
              'name' => __( 'Clients' ),
              'singular_name' => __( 'Clients' )
            ),
            'public' => true,
            'has_archive' => false,
            'taxonomies' => array('clients', 'post_tag'),
            'show_in_rest' => true,
            'rest_base'          => 'clients',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'rewrite' => array('slug' => 'clients', 'with_front' => false),
        )
    );

    register_post_type( 'service',
        array(
            'labels' => array(
              'name' => __( 'Service' ),
              'singular_name' => __( 'Service' )
            ),
            'public' => true,
            'has_archive' => false,
            'taxonomies' => array('service', 'post_tag', 'category'),
            'show_in_rest' => true,
            'rest_base'          => 'service',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'rewrite' => array('slug' => 'service', 'with_front' => false),
        )
    );

    register_post_type( 'assignment',
        array(
            'labels' => array(
              'name' => __( 'Assignment' ),
              'singular_name' => __( 'Assignment' )
            ),
            'public' => true,
            'has_archive' => false,
            'taxonomies' => array('assignment', 'post_tag', 'category'),
            'show_in_rest' => true,
            'rest_base'          => 'assignment',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'rewrite' => array('slug' => 'assignment', 'with_front' => false),
        )
    );

    register_post_type( 'association',
        array(
            'labels' => array(
              'name' => __( 'Association' ),
              'singular_name' => __( 'Association' )
            ),
            'public' => true,
            'has_archive' => false,
            'taxonomies' => array('association', 'post_tag', 'category'),
            'show_in_rest' => true,
            'rest_base'          => 'association',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'rewrite' => array('slug' => 'association', 'with_front' => false),
        )
    );
}
add_action( 'init', 'create_post_type' );

/**
 * @desc Clean up the_archive_title
 */

add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
         } elseif ( is_post_type_archive() ) {
            $title = post_type_archive_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }

    return $title;
});

/**
 * Give CPT's author filtering support
 */

function cpt_support_author() {
    add_post_type_support( 'custom_post', 'author' );
}
add_action('init', 'cpt_support_author');

/**
 * Redirects search results from /?s=query to /search/query/
 *
 * @link http://txfx.net/wordpress-plugins/nice-search/
 *
 */

function redirect() {
  global $wp_rewrite;
  if (!isset($wp_rewrite) || !is_object($wp_rewrite) || !$wp_rewrite->get_search_permastruct()) {
    return;
  }
  $search_base = $wp_rewrite->search_base;
  if (is_search() && !is_admin() && strpos($_SERVER['REQUEST_URI'], "/{$search_base}/") === false && strpos($_SERVER['REQUEST_URI'], '&') === false) {
    wp_redirect(get_search_link());
    exit();
  }
}
add_action('template_redirect', 'redirect');
function rewrite($url) {
  return str_replace('/?s=', '/search/', $url);
}
add_filter('wpseo_json_ld_search_url', 'rewrite');
