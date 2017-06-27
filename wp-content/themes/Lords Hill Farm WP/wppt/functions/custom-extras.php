<?php

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );

/**
 * @desc pull first image from post, give placeholder if not found
 */

function first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/wp-content/themes/wppt/assets/img/placeholder.png";
  }
  return $first_img;
}