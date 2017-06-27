<?php
/**
 * The template for displaying a single post.
 *
 * @link http://wphierarchy.com/
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wppt
 */

 get_header(); ?>

<h1>services</h1>

 	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_ID(); ?>

		<?php the_time('l, F jS, Y'); ?>

		<?php the_content(); ?>

		<?php pagination_bar($post); ?>

		<?php the_tags( '<p class="tags">Tags: ', ', ', '</p>'); ?>

	<?php endwhile; ?>


	<h2>You may also like</h2>

	<?php
		$i = 0;
		$args = array(
			'posts_per_page'   => 4,
			'post_type'		   => get_post_type(get_the_ID()),
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_status'      => 'publish',
			'post__not_in' => array($post->ID)
			);
		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) : $loop->the_post();
		$i++
	 ?>

		<a href="<?= get_post_permalink(); ?>">

			<?= $loop->post->post_title ?>

			<?= date('d/M/Y', strtotime($loop->post->post_date)) ?>

			<?= get_the_excerpt(); ?>
		</a>


	<?php endwhile; ?>


	<?php wp_reset_query(); ?>

<?php get_footer(); ?>
