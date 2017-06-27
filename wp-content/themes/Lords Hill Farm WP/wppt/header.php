<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wppt
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="cleartype" content="on"/>
	<meta name="msapplication-tap-highlight" content="no">
	<link rel="dns-prefetch" href="//<?= home_url(); ?>">
	<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
	<link rel="dns-prefetch" href="//js-agent.newrelic.com">
	<link rel="dns-prefetch" href="//use.typekit.net">
	<link rel="dns-prefetch" href="https://www.google-analytics.com">
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="revisit-after" content="14 days">
	<meta name="robots" content="all">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="url" content="<?= home_url(); ?>">
	<base href="<?= home_url(); ?>">

	<?php /* add favicon using http://realfavicongenerator.net */ ?>

	<?php /* modernizr and lazyload are now added in setup-scripts */ ?>


		<? if(PM::get_option( 'site', 'analytics' )) :?>

		<? $analytics = explode("\n", PM::get_option( 'site', 'analytics' ));?>

		<script>
			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] || function() {
						(i[r].q = i[r].q || []).push(arguments)
					}, i[r].l = 1 * new Date();
				a = s.createElement(o),
					m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
			<? foreach($analytics as $key => $code) :?>
			ga('create', '<?= trim($code) ?>', 'auto', '<?= $key ?>');
			ga('<?= $key?>.send', 'pageview'<?= ( is_404() ) ? ",'/404/?url=' + document.location.pathname + document.location.search + '&ref=' + document.referrer" : "" ?>);
			<? endforeach;?>
		</script>

	<? endif;?>

	<? if ( PM::get_option( 'site', 'typekit' ) ) : ?>
		<script src="https://use.typekit.net/<? PM::print_option( 'site', 'typekit' ); ?>.js"></script>
		<script>try {
				Typekit.load({async: false});
			} catch(e) {
			}</script>
	<? endif; ?>

	<?php wp_head(); ?>

</head>

<?php if ( ! is_front_page() ) { $pagename = basename( get_permalink() ); } ?>

<body <?php body_class( $pagename . '-page' ); ?> itemscope itemtype="http://schema.org/WebPage">

<header class="l-head">
	<div class="l-container">

		<div class="l-row">

			<div class="l-col  l-col--3  l-col--content  l-col--mq-tab-lrg">
				<? if ( is_front_page() || is_home() ) {?>
					<p></p>
				<? } else { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="c-logo  c-logo--header">
						<img class="mw100" src="<?= get_template_directory_uri() ?>/assets/img/nav-logo.png" alt="Jireh-Tek Logo">
					</a>
				<? } ?>
					<a href="" class="js-nav-trigger  c-burger">
						<span class="c-burger__line  c-burger__line--1"></span>
						<span class="c-burger__line  c-burger__line--2"></span>
					</a>
			</div>

			<div class="l-col  l-col--9  l-col--content  l-col--mq-tab-lrg  text--centre">

				<div class="l-head__social">
					<? if(PM::get_option( 'venue', 'phone' )): ?>
						<div class="l-head__social__icon  mb--20">

							<a href="tel:<?= PM::get_option( 'venue', 'phone' ) ?>">
								<div class="icon  icon--alt  icon-phone"></div>
							</a>

						</div>
					<? endif; ?>

					<? if(PM::get_option( 'site', 'email' )): ?>
						<div class="l-head__social__icon  mb--20">

							<a href="mailto:<?= PM::get_option( 'site', 'email' ) ?>">
								<div class="icon  icon--alt  icon-envelope"></div>
							</a>

						</div>
					<? endif; ?>

					<?php if (PM::get_option( 'social', 'facebook' )): ?>
						<div class="l-head__social__icon  mb--20">
							<a href="http://www.facebook.com/<?= PM::get_option( 'social', 'facebook' ) ?>" target="_blank">
								<div class="icon  icon--alt  icon-facebook"></div>
							</a>
						</div>
					<?php endif ?>

					<?php if (PM::get_option( 'social', 'twitter' )): ?>
					<div class="l-head__social__icon  mb--20">
							<a href="http://www.twitter.com/<?= PM::get_option( 'social', 'twitter' ) ?>" target="_blank">
								<div class="icon  icon--alt  icon-twitter"></div>
							</a>
						</div>
					<?php endif ?>

					<?php if (PM::get_option( 'social', 'instagram' )): ?>
					<div class="l-head__social__icon  mb--20">
							<a href="http://www.instagram.com/<?= PM::get_option( 'social', 'instagram' ) ?>" target="_blank">
								<div class="icon  icon--alt  icon-instagram"></div>
							</a>
						</div>
					<?php endif ?>
					<?php if (PM::get_option( 'social', 'linkedin' )): ?>
					<div class="l-head__social__icon  mb--20">
							<a href="http://www.linkedin.com/in/<?= PM::get_option( 'social', 'linkedin' ) ?>" target="_blank">
								<div class="icon  icon--alt  icon-linkedin"></div>
							</a>
						</div>
					<?php endif ?>
				</div>


				<nav class="js-nav  l-nav  l-nav__link--alt">

					<?php
						$args = [
							'theme_location'  => 'primary',
							'container'       => 'false',
							'container_class' => false,
							'container_id'    => false,
							'items_wrap'      => '<ul class="l-nav__wrap"  role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>',
							'menu_class'			  => 'l-nav',
							'walker'          => new wp_walker_nav
						];
						wp_nav_menu( $args );
					?>
				</nav>
			</div>
	</div>
</header>

<main>
