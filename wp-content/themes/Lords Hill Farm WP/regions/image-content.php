<?php $image = get_sub_field('image'); ?>
<?php $content = get_sub_field('content'); ?>


<section>
	<div class="container">
		<div class="row  table">

			<div class="col  col--no-float  col--6  table__cell">
				<div class="block  block__background" style="background-image: url(<?= $image['sizes']['large'] ?>)"></div>
			</div>

			<div class="col  col--no-float  col--6  table__cell  u-pl50  u-pr50">
				<p><?=$content?></p>
			</div>
			
		</div>
	</div>
</section>
