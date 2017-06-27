<?
$clients = get_posts(array(
    'post_type' => 'clients',
    'numberposts' => -1
));

$choose_clients = get_sub_field('choose_client');

$clients2 = get_sub_field('link');

$clients_name = get_posts('post_title');

?>

<div class="l-container">
    <div class="l-row  ptb100">

        <h1 class="h-beta  text--upper  pb15"><?= get_the_title(); ?></h1>
        <? foreach($clients as $client): ?>

            <? $client_data = get_fields($client->ID); ?>

            <div class="l-col  l-col--6  l-col--content  l-col--mq-tab-lrg">
                <div class="c-testimonials  c-testimonials--image  text--center">

                    <?php if ($client_data['image']) : ?>
                        <a href="<?= $client_data['link'] ?>" target="_blank">
                            <img class="mw100" src="<?= $client_data['image']['sizes']['large'] ?>" />
                        </a>
                    <? else : ?>
                        <img class="mw100" src="<?= get_template_directory_uri() ?>/assets/img/nav-logo.png" alt="Jireh-Tek Logo">
                    <?php endif ?>
                </div>
            </div>

         <? endforeach ?>
    </div>
</div>
