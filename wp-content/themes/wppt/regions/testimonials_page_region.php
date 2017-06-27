<?
$choose_testimonials = get_sub_field('choose_testimonials');
$i = 1;
?>

<?php if ($choose_testimonials): ?>

	<div class="l-container  c-testimonials">

		<div class="l-row  pt100">
		    <h1 class="h-beta  text--upper">
		    	<?= get_the_title(); ?>
		    </h1>
	    </div>

	</div>

	<div class="c-testimonials__wrap">

		<div class="l-container">

			<div class="l-row  ptb20">

				<? foreach($choose_testimonials as $testimonial): ?>

					<div class="l-col  l-col  l-col--6  l-col--content  l-col--mq-tab-lrg">

						<? $testimonial_data = get_fields($testimonial->ID); ?>

						<div class="l-col  l-col--3  l-col--content  l-col--mq-tab-lrg">
							<div class="c-testimonials__image">
								<?php if ($testimonial_data['image']) : ?>
									<img class="mw100" src="<?= $testimonial_data['image']['sizes']['large']; ?>" alt="Jireh-Tek Testimonial Image" />
								<? else : ?>
									<img class="mw100" src="<?= get_template_directory_uri(); ?>/assets/img/nav-logo.png" alt="Jireh-Tek Logo" />
								<?php endif; ?>
							</div>
						</div>

						<div class="l-col  l-col--9  l-col--content  l-col--mq-tab-lrg">
							<?php if ($testimonial_data['name']): ?>
								<p class="c-testimonials__name  c-testimonials__name--alt"><?= strip_tags($testimonial_data['name']); ?></p>
							<?php endif; ?>

							<?php if ($testimonial_data['position']): ?>
								<p><?= strip_tags($testimonial_data['position']); ?></p>
							<?php endif; ?>

							<?php if ($testimonial_data['bold_content']): ?>
								<p><?= strip_tags($testimonial_data['bold_content']); ?></p>
							<?php endif; ?>

							<?php if ($testimonial_data['content']): ?>
								<p><?= strip_tags($testimonial_data['content']); ?></p>
							<?php endif; ?>
						</div>

					</div>

		<?php if($i % 2 == 0): ?>

			</div>
		</div>
	</div>
	<div class="c-testimonials__wrap">

		<div class="l-container">

			<div class="l-row  ptb20">
		<? endif; ?>

					<? $i++; ?>

				<? endforeach; ?>

			</div>

		</div>

	</div>
<? endif ?>