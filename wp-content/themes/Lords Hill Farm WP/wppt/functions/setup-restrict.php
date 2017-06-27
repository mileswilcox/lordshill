<?php

/**
 * @desc Hide admin bar
 */

add_filter('show_admin_bar', '__return_false');

/*
 * @desc Stop core updates for non admins, Disable upgrade now messages for non admins
 */

if ( current_user_can('manage_options') != true ) {

	function remove_core_updates(){
		global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
	}
	add_filter('pre_site_transient_update_core','remove_core_updates');
	add_filter('pre_site_transient_update_plugins','remove_core_updates');
	add_filter('pre_site_transient_update_themes','remove_core_updates');
	add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
	add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );

}

/*
 * @desc Remove version info from head and feeds for added security
 */

add_filter('the_generator', '__return_false');


/*
 * @desc Hide visual and text tabs to stop users switching
 */

function hide_editor_tabs() {
	global $pagenow;
	// Only output the CSS if we're on the edit post or add new post screens.
	if ( ! ( 'post.php' == $pagenow || 'post-new.php' == $pagenow ) ) {
		return;
	}
	?>
	<style>
		.wp-editor-tabs {
			display: none;
		}
	</style>
	<?php
}
add_action( 'admin_head', 'hide_editor_tabs' );

/*
 * @desc Default to visual tab as user won\'t be able to switch
 */

function force_default_editor() {
	return 'tinymce';
}
add_filter( 'wp_default_editor', 'force_default_editor' );

/**
 * Remove unnecessary dashboard widgets
 *
 * @link http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
 */
function remove_dashboard_widgets() {
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
  remove_meta_box('dashboard_primary', 'dashboard', 'normal');
  remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
}
add_action('admin_init', 'remove_dashboard_widgets');

/**
 * @desc Remove comments support and remove from sidebar
 */

function remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_admin_menus' );

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
add_action('init', 'remove_comment_support', 100);

function my_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );


/**
 * @param $src
 * @return string
 * @desc Remove version number from styles and scripts
 */

// Remove WP Version From Styles
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}


/**
 * @desc Remove Emojis
 */

function disable_wp_emojicons() {
	// all actions related to emojis
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	// filter to remove TinyMCE emojis
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );

function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
add_action( 'init', 'disable_emojicons_tinymce' );


/**
 * @desc Clean up WP Head
 */

function head_cleanup() {
	remove_action('wp_head', 'feed_links_extra', 3);
	add_action('wp_head', 'ob_start', 1, 0);
	add_action('wp_head', function () {
	  $pattern = '/.*' . preg_quote(esc_url(get_feed_link('comments_' . get_default_feed())), '/') . '.*[\r\n]+/';
	  echo preg_replace($pattern, '', ob_get_clean());
	}, 3, 0);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10);
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	remove_action('wp_head', 'wp_oembed_add_host_js');
	remove_action('wp_head', 'rest_output_link_wp_head', 10);
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('use_default_gallery_style', '__return_false');

	global $wp_widget_factory;

	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
	  remove_action('wp_head', [$wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style']);
	}
}
add_action('init', 'head_cleanup');

/**
 * Clean up output of stylesheet <link> tags
 */
function clean_style_tag($input) {
  preg_match_all("!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches);
  if (empty($matches[2])) {
    return $input;
  }
  // Only display media if it is meaningful
  $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';
  return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}
add_filter('style_loader_tag', 'clean_style_tag');

/**
 * Clean up output of <script> tags
 */
function clean_script_tag($input) {
  $input = str_replace("type='text/javascript' ", '', $input);
  return str_replace("'", '"', $input);
}
add_filter('script_loader_tag', 'clean_script_tag');

/**
 * Remove unnecessary self-closing tags
 */
function remove_self_closing_tags($input) {
  return str_replace(' />', '>', $input);
}
add_filter('get_avatar', 'remove_self_closing_tags'); // <img />
add_filter('comment_id_fields', 'remove_self_closing_tags'); // <input />
add_filter('post_thumbnail_html', 'remove_self_closing_tags'); // <img />

/**
 * Don't return the default description in the RSS feed if it hasn't been changed
 */
function remove_default_description($bloginfo) {
  $default_tagline = 'Just another WordPress site';
  return ($bloginfo === $default_tagline) ? '' : $bloginfo;
}
add_filter('get_bloginfo_rss', 'remove_default_description');


/**
 * @desc Disable XML RPC
 */
add_filter('xmlrpc_enabled', '__return_false');
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

/**
 * Disable pingback XMLRPC method
 */
function filter_xmlrpc_method($methods) {
  unset($methods['pingback.ping']);
  return $methods;
}
add_filter('xmlrpc_methods', 'filter_xmlrpc_method', 10, 1);

/**
 * Disable XMLRPC call
 */
function kill_xmlrpc($action) {
  if ($action === 'pingback.ping') {
    wp_die('Pingbacks are not supported', 'Not Allowed!', ['response' => 403]);
  }
}
add_action('xmlrpc_call', 'kill_xmlrpc');

/**
 * Remove pingback header
 */
function filter_headers($headers) {
  if (isset($headers['X-Pingback'])) {
    unset($headers['X-Pingback']);
  }
  return $headers;
}
add_filter('wp_headers', 'filter_headers', 10, 1);

/**
 * Kill bloginfo('pingback_url')
 */
function kill_pingback_url($output, $show) {
  if ($show === 'pingback_url') {
    $output = '';
  }
  return $output;
}
add_filter('bloginfo_url', 'kill_pingback_url', 10, 2);

/**
 * Kill trackback rewrite rule
 */
function filter_rewrites($rules) {
  foreach ($rules as $rule => $rewrite) {
    if (preg_match('/trackback\/\?\$$/i', $rule)) {
      unset($rules[$rule]);
    }
  }
  return $rules;
}
add_filter('rewrite_rules_array', 'filter_rewrites');


// Prevents WordPress from testing ssl capability on domain.com/xmlrpc.php?rsd
remove_filter('atom_service_url','atom_service_url_filter');

// allow editors access to menus
$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );

// hide widgets
function hide_menu() {
    remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu
}
add_action('admin_head', 'hide_menu');
