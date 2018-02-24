<?php
/**
 * Template Name: Home
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="ui grid">	

				<!-- row -->
				<div class="row">
					<div class="sixteen wide mobile eleven wide computer column">
						
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
					<div class="sixteen wide mobile five wide computer column">
						
					</div>
				</div>
				<!-- row -->

				<!-- row -->
				<div class="row">
					<div class="sixteen wide mobile eleven wide computer column ui grid">
						<div>
							<h3 class="news-list-title">Berita Terkini</h3>
						</div>
						
						<?php

						// The Query
						$args = array(
							'post_type' => 'post'
						);
						$query1 = new WP_Query( $args );

						while ( $query1->have_posts() ) {
							$query1->the_post();

							/*
							* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
							get_template_part( 'template-parts/post-item', get_post_format() );


							/* Restore original Post Data 
							* NB: Because we are using new WP_Query we aren't stomping on the 
							* original $wp_query and it does not need to be reset with 
							* wp_reset_query(). We just need to set the post data back up with
							* wp_reset_postdata().
							*/
							wp_reset_postdata();
						}
						?>

					</div>

					<div class="sixteen wide mobile five wide computer column ui grid">
						<?php get_sidebar(); ?>
					</div>
				</div>
				<!-- row -->

			</div><!-- #grid -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
