<?php $heading = get_sub_field('title'); ?>
<?php $subtitle = get_sub_field('subtitle'); ?>
<?php $image = get_sub_field('image'); ?>

<div class="hero__bg  hero__bg--inside-page"  style="background-image: url(<?= $image['sizes']['large'] ?>)">
	<div class="hero__wrap  hero__wrap--inside-page">
		<div class="container">
			<div class="col col--full  text-left">
				<div class="row">

					<h1 class="hero  hero__heading"><?= $heading ?></h1>
					<p class="hero  hero__sub-heading"><?= $subtitle ?></p>

				</div>
			</div>
		</div>
	</div>
</div>
