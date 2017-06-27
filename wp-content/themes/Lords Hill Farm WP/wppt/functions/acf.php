<?php

	add_filter( 'acf/settings/load_json', 'my_acf_json_load_point' );

	function my_acf_json_load_point( $paths ) {

		unset( $paths[0] );

		$paths[] = get_template_directory() . '/acf-json';

		return $paths;

	}

	function my_acf_init() {

		acf_update_setting('google_api_key', 'xxx');
	}

	add_action('acf/init', 'my_acf_init');