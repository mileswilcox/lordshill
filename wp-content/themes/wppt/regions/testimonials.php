<?
$choose_testimonials = get_sub_field('choose_testimonials');
$i = 1;
?>

<?php if ($choose_testimonials): ?>

	<div class="c-slider">

		<div class="l-container">

			<div class="l-row">

				<div class="main-carousel  carousel">

					<? foreach($choose_testimonials as $testimonial): ?>

						<? $testimonial_data = get_fields($testimonial->ID); ?>

						<div class="carousel-cell">

							<div class="l-col  l-col--offset-1  l-col--3  l-col--content  l-col--mq-tab-lrg">
								<div class="c-testimonials__image">
									<?php if ($testimonial_data['image']) : ?>
										<img class="mw100" src="<?= $testimonial_data['image']['sizes']['slider-image'] ?>" alt="Jireh-Tek Testimonial Image" />
									<? else : ?>
										<img class="mw100" src="<?= get_template_directory_uri() ?>/assets/img/nav-logo.png" alt="Jireh-Tek Logo" />
									<?php endif; ?>
								</div>
							</div>

							<div class="l-col  l-col--7  l-col--content  l-col--mq-tab-lrg  secondaryColor">
								<h1 class="h-zeta  text--upper  c-testimonials__title">Testimonials</h1>

								<?php if ($testimonial_data['bold_content']): ?>
									<h2 class="c-testimonials__copy"><?=strip_tags($testimonial_data['bold_content']);?></h2>
								<?php endif; ?>

								<?php if ($testimonial_data['content']): ?>
									<p class="secondaryColor  pb40"><?=strip_tags($testimonial_data['content']);?></p>
								<?php endif; ?>

								<?php if ($testimonial_data['name']): ?>
									<p class="c-testimonials__name  ib"><?=strip_tags($testimonial_data['name']);?></p>
								<?php endif; ?>

								<?php if ($testimonial_data['position']): ?>
									<p class="c-testimonials__position ib"><?=strip_tags($testimonial_data['position']);?></p>
								<?php endif; ?>
							</div>
							
						</div>

					<? endforeach; ?>

				</div>

			</div>

		</div>

	</div>

<? endif; ?>