<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="ui grid">	
				<div class="row">
					<!-- left column -->
					<div class="sixteen wide mobile eleven wide computer column">
					<?php
					while ( have_posts() ) : the_post();
						$format = get_post_format( $post->ID );

						if($format === 'gallery') {
							get_template_part( 'template-parts/content-format-gallery', get_post_type() );
						}	
						else {
							get_template_part( 'template-parts/content', get_post_type() );
						}
						the_post_navigation();

						// If comments are open or we have at least one comment, load up the comment template.
						/** 
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						*/
					endwhile; // End of the loop.
					?>
					</div><!-- left column -->

					<div class="sixteen wide mobile five wide computer column">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div><!-- #grid -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
