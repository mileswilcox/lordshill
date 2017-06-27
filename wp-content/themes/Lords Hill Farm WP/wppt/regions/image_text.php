<?php $name = get_sub_field('name'); ?>
<?php $content = get_sub_field('content'); ?>
<?php $image = get_sub_field('image'); ?>
<?php $position = get_sub_field('position'); ?>



<div class="l-container">
    <div class="l-row">

        <div class="l-col  l-col--offset-1  l-col--3  l-col--content  l-col--mq-tab-lrg  ptb100">
            <div class="">
                <img class="scale-with-grid" src="<?= $image['sizes']['background'] ?>" alt="Jireh-Tek Logo">
            </div>
        </div>
        <div class="l-col  l-col--7  l-col--content  l-col--mq-mob-lrg  ptb100">
            <h1 class="h-zeta  h-zeta--alt  text--upper"><?= $position ?></h1>
            <h1 class="h-beta  text--upper  pb15"><?= $name ?></h1>
            <?= $content?>
        </div>

    </div>
</div>
