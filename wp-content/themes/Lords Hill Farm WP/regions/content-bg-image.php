<?php $content = get_sub_field('content'); ?>
<?php $image = get_sub_field('image'); ?>


<div class="parallax" style="background-image: url(<?= $image['sizes']['large'] ?>)">
	<div class="container sections">
		<div class="row">
			<div class="col col--12  text-center">

				<div class="secondary-text-color"><?=$content?></div>

			</div>
		</div>
	</div>
</div>
