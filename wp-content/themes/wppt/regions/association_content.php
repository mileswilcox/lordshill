<?php
$choose_association = get_sub_field('choose_association');

if($choose_assignment):
	$association_content = get_fields($choose_association[0]->ID);
	$choose_associationt_image = $association_content['image'];
	?>

	<div class="l-container  c-arrow">

		<div class="l-row">

			<div class="l-col  l-col--6  l-col--content  l-col--mq-mob-lrg  ptb100">
				<h1 class="h-beta  text--upper  pb15"><?= get_the_title(); ?></h1>
	        	<?= $association_content['content'] ?>
			</div>
			<? if(!($choose_association_image == NULL)): ?>
			<div class="l-col  l-col--6  l-col--content  l-col--mq-mob-lrg  ptb100">
				<img class="scale-with-grid" src="<?= $choose_association_image['sizes']['background'] ?>" alt="Jireh-Tek Logo">
			</div>
			<? endif; ?>
		</div>

	</div>
<? endif; ?>
