<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="ui grid">	
				<div class="row">
					<!-- left column -->
					<div class="sixteen wide mobile eleven wide computer column ui grid">
						<?php
						if ( have_posts() ) : ?>

							<header class="page-header">
								<?php
									the_archive_title( '<h3 class="news-list-title">', '</h3>' );
								?>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								* Include the Post-Format-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Format name) and that will be used instead.
								*/
								get_template_part( 'template-parts/post-item', get_post_format() );

							endwhile;

							the_posts_navigation(POST_PAGING_NAV_TEXT);

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div><!-- left column -->

					<div class="sixteen wide mobile five wide computer column ui grid">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div><!-- #grid -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
