<?
$sldier = get_posts(array('post_type' => 'clients'));
?>

<div class="c-slider">

	<div class="l-container">

		<div class="l-row">

			<div class="main-carousel  carousel">

				<? foreach($clients as $client): ?>

					<? $client_data = get_fields($slide->ID); ?>

					<div class="carousel-cell">
						<div class="l-col  l-col--offset-1  l-col--3  l-col--content  l-col--mq-tab-lrg">
							<div class="c-testimonials  c-testimonials--image">
							<?php if ($client_data['image']) : ?>
								<img class="mw100" src="<?= $client_data['image']['sizes']['slider-image'] ?>" />
							<? else : ?>
								<img class="mw100" src="<?= get_template_directory_uri() ?>/assets/img/nav-logo.png" alt="Jireh-Tek Logo">
							<?php endif ?>

							</div>

						</div>
					</div>

				<? endforeach ?>
			</div>

		</div>

	</div>




</div>

