<?php
/**
 * Template Name: Home
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();
			?>
				<div class="ui grid">
					
					<div class="row">
						<div class="eleven wide column">
							
							<!-- Home Banner -->
							<div class="home-banner">
								<div class="main-banner">
									<div class="banner-image"></div>
									<div class="banner-text">
										Lorem ipsum dolor sit amet
									</div>
								</div>
							</div>	
							<!-- Home Banner End -->

						</div>
						<div class="five wide column">
							
						</div>
					</div>

					<div class="row">
						<div class="eleven wide column ui grid">
							<div class="news-list-title">
								<h3>Berita Terkini</h3>
							</div>
							
							<!-- News Item -->
							<a href="javascript:;" class="news-item row">
								<div class="four wide column">
									<img class="news-thumb"  src="<?php echo get_template_directory_uri(). '/img/testimage1.jpg';?>" alt="" />
								</div>
								<div class="twelve wide column news-item-box">
									<p class="news-item-title">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
									<p class="news-item-date"><span class="category">News</span><span class="date">20/02/2018, 14:25 WIB</span></p>
								</div>
							</a>
							<!-- New Item End -->

							<a href="javascript:;" class="news-item row">
								<div class="four wide column">
									<img class="news-thumb" src="<?php echo get_template_directory_uri(). '/img/testimage1.jpg';?>" alt="" />
								</div>
								<div class="twelve wide column news-item-box">
									<p class="news-item-title">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
									<p class="news-item-date"><span class="category">News</span><span class="date">20/02/2018, 14:25 WIB</span></p>
								</div>
							</a>
						</div>
						<div class="five wide column ui grid">

							<div class="news-list-title">
								<h3>Terpopuler</h3>
							</div>

							<!-- News Item Small -->
							<a href="javascript:;" class="news-item small row">
								<div class="six wide column">
									<img class="news-thumb" src="<?php echo get_template_directory_uri(). '/img/testimage1.jpg';?>" alt="" />
								</div>
								<div class="ten wide column news-item-box">
									<p class="news-item-title">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
									<p class="news-item-date"><span class="category">News</span><span class="date">1 Jam yg lalu</span></p>
								</div>
							</a>	
							<!-- News Item Small End -->

							<!-- News Item Small -->
							<a href="javascript:;" class="news-item small row">
								<div class="six wide column">
									<img class="news-thumb" src="<?php echo get_template_directory_uri(). '/img/testimage1.jpg';?>" alt="" />
								</div>
								<div class="ten wide column news-item-box">
									<p class="news-item-title">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
									<p class="news-item-date"><span class="category">News</span><span class="date">1 Jam yg lalu</span></p>
								</div>
							</a>	
							<!-- News Item Small End -->
							
						</div>
					</div>
				</div>
			<?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
