<?php $cta1_title = get_sub_field('cta1_title'); ?>
<?php $cta1_subtitle = get_sub_field('cta1_subtitle'); ?>
<?php $cta1_image = get_sub_field('cta1_image'); ?>
<?php $cta1_url = get_sub_field('cta1_url'); ?>

<?php $cta2_title = get_sub_field('cta2_title'); ?>
<?php $cta2_subtitle = get_sub_field('cta2_subtitle'); ?>
<?php $cta2_image = get_sub_field('cta2_image'); ?>
<?php $cta2_url = get_sub_field('cta2_url'); ?>

<?php $cta3_title = get_sub_field('cta3_title'); ?>
<?php $cta3_subtitle = get_sub_field('cta3_subtitle'); ?>
<?php $cta3_image = get_sub_field('cta3_image'); ?>
<?php $cta3_url = get_sub_field('cta3_url'); ?>

<div class="container">

	<div class="row">
		<div class="col col--4  mq-tab--full  u-pt50">

			<div class="card">

				<div class="card__wrap" style="background-image: url(<?= $cta1_image['sizes']['large'] ?>)">

					<a href="<?= $cta1_url ?>" class="card__overlay">
						<div class="card__caption  card__caption--text">
							<span class="card__caption--title"><?= $cta1_title ?></span><br>
							<span class="card__caption--sub-title"><?= $cta1_subtitle ?></span>
						</div>
					</a>

				</div>

			</div>

		</div>

		<div class="col col--4  mq-tab--full  u-pt50">

			<div class="card">

				<div class="card__wrap" style="background-image: url(<?= $cta2_image['sizes']['large'] ?>)">

					<a href="<?= $cta2_url ?>" class="card__overlay">
						<div class="card__caption  card__caption--text">
							<span class="card__caption--title"><?= $cta2_title ?></span><br>
							<span class="card__caption--sub-title"><?= $cta2_subtitle ?></span>
						</div>
					</a>

				</div>

			</div>

		</div>

		<div class="col col--4  mq-tab--full  u-pt50">

			<div class="card">

				<div class="card__wrap" style="background-image: url(<?= $cta3_image['sizes']['large'] ?>)">

					<a href="<?= $cta3_url ?>" class="card__overlay">
						<div class="card__caption  card__caption--text">
							<span class="card__caption--title"><?= $cta3_title ?></span><br>
							<span class="card__caption--sub-title"><?= $cta3_subtitle ?></span>
						</div>
					</a>

				</div>

			</div>

		</div>

	</div>

</div>
