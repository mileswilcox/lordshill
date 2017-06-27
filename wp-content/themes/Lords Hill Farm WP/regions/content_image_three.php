<?php $image1 = get_sub_field('image1'); ?>
<?php $image2 = get_sub_field('image2'); ?>
<?php $image3 = get_sub_field('image3'); ?>

<?php $content = get_sub_field('content'); ?>


<div class="container  banner">

	<div class="row">
		<div class="col  col--6  col--offset-2  mq-tab--full">
			<p><?=$content?></p>
		</div>

		<div class="col  col--4  text-center  mq-tab--full">
			<div class="js-load-img" data-src="<?= $image1['sizes']['large'] ?>" data-height="310" data-width="310"></div>
			<br>
			<br>
			<div class="js-load-img" data-src="<?= $image2['sizes']['large'] ?>" data-height="310" data-width="310"></div>
			<br>
			<br>
			<div class="js-load-img" data-src="<?= $image3['sizes']['large'] ?>" data-height="310" data-width="310"></div>
		</div>
	</div>
	
</div>
