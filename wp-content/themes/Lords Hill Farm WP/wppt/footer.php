<?php
	/**
	 * The template for displaying the footer.
	 *
	 * Contains the closing of the #content div and all content after.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package wppt
	 */

?>

</main>
<footer class="l-footer">

	<div class="l-footer__wrap--nav-wrap">

		<div class="l-container">
			<div class="clear"></div>

			<div class="l-footer__content">

				<div class="l-col  l-col--12  l-col--content  l-col--mq-mob-lrg">
					<?php
						$args = [
							'menu'  => 'Footer Menu',
							'container'       => 'false',
							'container_class' => false,
							'container_id'    => false,
							'items_wrap'      => '<ul class="l-footer__nav"  role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">%3$s</ul>',
							'menu_class'			  => 'l-footer__nav',
							'walker'          => new wp_walker_nav
						];
						wp_nav_menu( $args );
					?>
				</div>

			</div>
		</div>

	</div>

	<div class="l-footer__wrap--top">

		<div class="l-container">
			<div class="clear"></div>

			<div class="l-footer__content">

				<div class="l-col  l-col--3  l-col--content  l-col--mq-mob-lrg">

				</div>

				<div class="l-col  l-col--3  l-col--content  l-col--mq-mob-lrg">
					<p class="h-zeta  text--upper">Head Office</p>
					<? if(PM::get_option( 'venue', 'address' )): ?>
						<p><?=$address = PM::get_option( 'venue', 'address' );?></p>
					<? endif; ?>
				</div>

				<div class="l-col  l-col--offset-1  l-col--2  l-col--content  l-col--mq-mob-lrg">
					<p class="h-zeta  text--upper">Telephone</p>
					<p>
						<? if(PM::get_option( 'venue', 'phone' )): ?>
						<a href="tel:<?= PM::get_option( 'venue', 'phone' ) ?>"><?= PM::get_option( 'venue', 'phone' ) ?></a>
						<? endif; ?>	<br />

						<? if(PM::get_option( 'venue', 'phone_alt' )): ?>
						<a href="tel:<?= PM::get_option( 'venue', 'phone_alt' ) ?>"><?= PM::get_option( 'venue', 'phone_alt' ) ?></a>
						<? endif; ?>
					</p>

				</div>

				<div class="l-col  l-col--3  l-col--content  l-col--mq-mob-lrg">
					<p class="h-zeta  text--upper">Email</p>
					<? if(PM::get_option( 'site', 'email' )): ?>
						<p>
							<a href="mailto:<?= PM::get_option( 'site', 'email' ) ?>"><?= PM::get_option( 'site', 'email' ) ?></a>
						</p>
					<? endif; ?>
				</div>

				<div class="l-col  l-col--2  l-col--content  l-col--mq-mob-lrg">

					<div class="l-footer__social">


						<?php if (PM::get_option( 'social', 'facebook' )): ?>
							<div class="l-footer__social__icon  mb--20">
								<a href="http://www.facebook.com/<?= PM::get_option( 'social', 'facebook' ) ?>" target="_blank">
									<div class="icon icon-facebook"></div>
								</a>
							</div>
						<?php endif ?>

						<?php if (PM::get_option( 'social', 'twitter' )): ?>
							<div class="l-footer__social__icon  mb--20">
								<a href="http://www.twitter.com/<?= PM::get_option( 'social', 'twitter' ) ?>" target="_blank">
									<div class="icon icon-twitter"></div>
								</a>
							</div>
						<?php endif ?>

						<?php if (PM::get_option( 'social', 'instagram' )): ?>
							<div class="l-footer__social__icon  mb--20">
								<a href="http://www.instagram.com/<?= PM::get_option( 'social', 'instagram' ) ?>" target="_blank">
									<div class="icon icon-instagram"></div>
								</a>
							</div>
						<?php endif ?>

						<?php if (PM::get_option( 'social', 'linkedin' )): ?>
							<div class="l-footer__social__icon  mb--20">
								<a href="http://www.linkedin.com/in/<?= PM::get_option( 'social', 'linkedin' ) ?>" target="_blank">
									<div class="icon icon-linkedin"></div>
								</a>
							</div>
						<?php endif ?>

					</div>

				</div>


				<div class="clear"></div>
			</div>

		</div>

	</div>

	<div class="l-footer__wrap--bottom">

		<div class="l-container">

			<div class="">

				<div class="l-col  l-col--9  l-col--content  l-col--mq-mob-lrg">
					<p class="h-zeta  text--upper">Registered Office</p>
					<? if(PM::get_option( 'venue', 'business_address' )): ?>
						<p><?= PM::get_option( 'venue', 'business_address' ) ?></p>
					<? endif; ?>
				</div>

				<div class="l-col  l-col--3  l-col--content  l-col--mq-mob-lrg  text--right">
					<a href="https://www.propeller.co.uk/" target="_blank" class="h-zeta  text--upper">Site By Propeller</a>
				</div>


				<div class="clear"></div>
			</div>

		</div>

	</div>

	</footer>
<script>
	LazyLoad.js(['//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js', '<? bloginfo( 'template_url' ) ?>/assets/js/main.min.js'], function() {
		window.init()
	});
</script>

<?php wp_footer(); ?>

</body>
</html>
                                                                                                                                                                                                                                                                                                                           
