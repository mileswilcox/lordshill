<?php
$title = get_sub_field('title');
$image = get_sub_field('image');
$content_type = get_sub_field('content_type');
$content_type = strtolower($content_type);
?>

<div class="banner  background  background--container" style="background-image: url('<?= $image['sizes']['banner'] ?>');">
	<div class="banner--content-wrap  secondaryColor  <? if (is_front_page() || is_home()): ?>banner--content-wrap__push<? endif; ?>">
		<? if(is_front_page() || is_home()): ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="c-logo  c-logo--header">
				<img class="mw100" src="<?= get_template_directory_uri() ?>/assets/img/logo.png" alt="Jireh-Tek Logo">
			</a>
		<? endif; ?>
		<div class="l-col  l-col--6  l-col--mq-tab-lrg">

			<? if($content_type && $content_type != 'custom'): ?>
				<h2 class="h-zeta  h-zeta--alt  text--upper  secondaryColor"><?= $content_type ?></h2>

				<?
					$custom_content_type = strtolower($content_type);
					$posties = get_sub_field('content_type');
					$post_type = $posties;
					$args = array(
						'post_type' => $posties,
						'posts_per_page' => -1,
						'orderby'   => 'menu_order',
						'order' => 'ASC'
					);
					$loop = new WP_Query( $args );
				?>

				<? while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<div class="content">

						<a class="content--list-item" href="">
							<span class="h-beta  text--upper  secondaryColor"><?= strip_tags(the_title()); ?></span>
						</a>

						<?php if (get_field('content')): ?>
							<?
								$truncate_content = strip_tags(get_field('content'));
								$truncate_content = substr($truncate_content, 0, 150);
							?>
							<p class="secondaryColor"><?= $truncate_content ?>...</p>
						<?php endif ?>

					</div>
					
				<? endwhile ?>

			<? elseif($content_type && $content_type == 'custom'): ?>

				<?php $content_title = get_sub_field('content_title'); ?>
				<?php $content = get_sub_field('content'); ?>
				<?php $content_bold = get_sub_field('content_bold'); ?>

				<h2 class="h-zeta  h-zeta--alt  secondaryColor  pb20"><?= $content_title; ?></h2>
				<h1 class="h-beta  secondaryColor  pb20"><?= $content_bold; ?></h1>
				<p class="secondaryColor"><?= strip_tags($content, '<ul> <li> <a>'); ?></p>

			<? endif; ?>

		</div>
	</div>
</div>
