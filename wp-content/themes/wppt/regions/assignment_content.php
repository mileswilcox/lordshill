<?php
$choose_assignment = get_sub_field('choose_assignment');

if($choose_assignment):
	$assignment_content = get_fields($choose_assignment[0]->ID);
	$choose_assignment_image = $assignment_content['image'];
	?>

	<div class="l-container  c-arrow">

		<div class="l-row">

			<div class="l-col  l-col--6  l-col--content  l-col--mq-mob-lrg  ptb100">
				<h1 class="h-beta  text--upper  pb15"><?= get_the_title(); ?></h1>
	        	<?= $assignment_content['content'] ?>
			</div>
			<? if(!($choose_assignment_image == NULL)): ?>
			<div class="l-col  l-col--6  l-col--content  l-col--mq-mob-lrg  ptb100">
				<img class="scale-with-grid" src="<?= $choose_assignment_image['sizes']['background'] ?>" alt="Jireh-Tek Logo">
			</div>
			<? endif; ?>
		</div>

	</div>
<? endif; ?>
