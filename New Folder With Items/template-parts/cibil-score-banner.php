	<?php
	$site_url = home_url();
	?>
	<section class="banner">
		<div class="container">
			<div class="banner__inner">
				<div class="banner__content">
					<h2 class="banner__title h2_title">Funding made easy with your CREDIT check</h2>
					<!--<p class="banner__descr">The new version of&nbsp;@moqups&nbsp;is really fantastic.</p> -->
					<a class="banner__btn btn"
						href="<?php echo esc_url($site_url) . '/creditscore/'; ?>">FREE
						CREDIT Score Check</a>
				</div>
				<div class="circle-animate">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="banner__image">
				<img
					src=<?php echo esc_url(get_template_directory_uri()) . "/images/mobile.webp" ?>
					alt="" />
				<img
					src=<?php echo esc_url(get_template_directory_uri()) . "/images/mobile-content.png" ?>
					alt="" />
			</div>
		</div>
	</section>