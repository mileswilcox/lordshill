<?

	function head() {

		wp_register_style( 'main', get_stylesheet_directory_uri() . '/main.css' );
		wp_enqueue_style( 'main' );

	}

	function clean( &$scripts ) {

		if ( ! is_admin() ) {

			$scripts->remove( 'jquery' );

		}

		remove_action( 'wp_head', 'rest_output_link_wp_head' );
		remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'template_redirect', 'rest_output_link_header', 11 );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
		remove_action('wp_head', 'wp_oembed_add_discovery_links');
		remove_action('wp_head', 'wp_oembed_add_host_js');

	}

	add_filter( 'wp_default_scripts', 'clean' );
	add_action( 'wp_enqueue_scripts', 'head' );
	add_filter( 'show_admin_bar', '__return_false' );

	/**
	 * Added script tags to head
	 */

	function modernizr() {
	    echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/assets/js/vendor/modernizr.min.js"></script>';
	    echo "\r\n";
	    echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/assets/js/vendor/lazyload.min.js"></script>';
	}
	add_action('wp_head', 'modernizr');