<?php

/**
 * default functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wppt
 */

/**
 * @desc Initial set up of scripts and styles
 */

include 'functions/setup-scripts.php';

/**
 * @desc Clean up WordPress extras
 */
include 'functions/setup-restrict.php';

/**
 * @desc Setup formatting for posts
 */
include 'functions/setup-formatting.php';

/**
 * @desc Setup image sizes
 */
include 'functions/setup-images.php';

/**
 * @desc Setup custom posts
 */
include 'functions/setup-posts.php';

/**
 * @desc Setup menus
 */
include 'functions/setup-menus.php';

/**
 * @desc Setup extra helper functions
 */
include 'functions/custom-extras.php';

/**
 * @desc Include Prop Manager by default for customisation
 */
include 'functions/prop-manager.php';

/**
 * @desc ACF Fields Config - For Child Theming
 */

include 'functions/acf.php';