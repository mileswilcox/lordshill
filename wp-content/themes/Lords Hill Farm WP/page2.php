<?php
/**
* Template Name: Home

 */

 $title = get_sub_field('title');
 $image = get_sub_field('image');

get_header(); ?>

<?php if ( have_rows( 'main_layout' ) ) {

	while ( have_rows( 'main_layout' ) ) {

		the_row();

		include get_template_directory() . '/regions/' . get_row_layout() . '.php';

	}

}  ?>


<main role="main">

	<div class="hero__bg"  style="background-image: url(<?php echo get_bloginfo('template_directory'); ?>/assets/img/hero-index.jpg)">
		<div class="hero__wrap">
			<div class="container">
				<div class="col col--full  text-left">
					<div class="row">

						<h1 class="hero  hero__heading">Welcome to <br>Lords Hill Farm</h1>
						<p class="hero  hero__sub-heading">Welcome to Lords Hill Farm </p>

					</div>
				</div>
			</div>
		</div>
	</div>

	<section>
		<div class="bg bg__about-me"></div>
		<div class="container">
			<div class="row">
				<div class="col  col--6">
					<p> Jane and her husband Ian have lived at Lords Hill Farm since their marriage in 1985 and his family have farmed here since 1936. Having rooms available for B&amp;B use and with their family more independent, Jane began a B&amp;B business to diversify.<p>
					<p>Lords Hill Farm is situated in a quiet rural location, just off the roman road 'Fosse Way', surrounded by green fields with views   over the Avon valley, yet only 1 mile from the A45 with easy access to the motorway network. It is ideally situated for guests       wishing to enjoy the peace and quiet of the countryside in excellent accommodation and yet be within easy reach of Coventry, Rugby, Leamington and many other places.</p>
				</div>

				<div class="col  col--6">
					<p>The guest accommodation of two double en-suite rooms is situated in an annexe to the farmhouse on the ground  floor and has it's own front door. A lounge for guests' use is available and there is ample parking area at the front of the house.</p>
					<p>The farmhouse is positioned away from the farm buildings and is surrounded by pleasant gardens with a large pond. There is a patio off the lounge for guests' use if you wish some privacy, but many to sit by the pond enjoying the views over the Avon valley and watching the wildlife, be it fish, swallows, ducks or moorhens.</p>
				</div>
			</div>
		</div>
	</section>

	<div class="parallax parallax__img-1">
	    <div class="container sections">
	        <div class="row">
	            <div class="col col--12  text-center">

	                <p class="secondary-text-color">Jane prides herself in knowing that all the produce for breakfast is either home made or from local producers.</p>

					<p class="secondary-text-color">Jane bakes her own bread and makes the preserves that are offered at breakfast, the sausage comes from her local butchers and the bacon from a local farmer. The fruit and vegetables are from a local greengrocer just 3 miles away who in turn supports local producers in Evesham where possible and with Ryton Organic on our doorstep, vegetarian options are easily sourced. Our own hens supply the eggs so are fresher than fresh!!!</p>

					<p class="secondary-text-color">Jane and Ian hope you will enjoy your stay with them and will feel it is 'Home from Home'.</p>

	            </div>
	        </div>
	    </div>
	</div>

	<div class="container">

		<div class="row">
			<div class="col col--4  mq-tab--full  u-pt50">

				<div class="card">

					<div class="card__wrap">

						<div class="js-load-img" data-src="assets/img/cta/cta-accomidation.jpg" data-height="310" data-width="310"></div>

							<a href="/accommodation.php" class="card__overlay">
								<div class="card__caption  card__caption--text">
									<p class="card__caption--title">Accommodation</p>
									<span class="card__caption--sub-title">View our accommodation</span>
								</div>
							</a>

					</div>

				</div>

			</div>

			<div class="col col--4  mq-tab--full  u-pt50">

				<div class="card">

					<div class="card__wrap">

						<div class="js-load-img" data-src="assets/img/cta/cta-price.jpg" data-height="310" data-width="310"></div>

							<a href="/price.php" class="card__overlay">
								<div class="card__caption  card__caption--text">
									<p class="card__caption--title">Prices</p>
									<span class="card__caption--sub-title">Find out our costings</span>
								</div>
							</a>

					</div>

				</div>

			</div>

			<div class="col col--4  mq-tab--full  u-pt50">

				<div class="card">

					<div class="card__wrap">

						<div class="js-load-img" data-src="assets/img/cta/cta-contact.jpg" data-height="310" data-width="310"></div>

							<a href="/contact.php" class="card__overlay">
 								<div class="card__caption  card__caption--text">
									<p class="card__caption--title">Contact</p>
									<span class="card__caption--sub-title">Get in touch with us</span>
								</div>
							</a>

					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="container">
		<div class="row">
			<div class="col  col--6  col--offset-3  text-center">

				<div id="TA_selfserveprop837" class="TA_selfserveprop">
					<ul id="lqOa6v0wZ" class="TA_links G2NLJ2wchX">
						<li id="JOWBaNr" class="uWZXQ126">
							<a target="_blank" href="https://www.tripadvisor.co.uk/"><img src="https://www.tripadvisor.co.uk/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
						</li>
					</ul>
				</div>
			<script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=837&amp;locationId=4454116&amp;lang=en_UK&amp;rating=true&amp;nreviews=2&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=true&amp;border=false&amp;display_version=2"></script>

		</div>
	</div>
</div>



</main>


<?php get_footer(); ?>
