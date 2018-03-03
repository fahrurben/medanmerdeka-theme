<?php
/**
 * Template Name: Index
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="ui grid">	
				<div class="row">
					<!-- left column -->
					<div class="sixteen wide mobile eleven wide computer column ui grid">
                        <?php
                        wp_reset_query();

                        // The Query
                        $args = array(
                            'post_type' => 'post'
                        );
                        $query1 = new WP_Query( $args );

						if ( $query1->have_posts() ) : ?>

							<header class="page-header">
                                <h3 class="news-list-title"><?php _e( 'Index', '_s' ); ?></h3>
                            </header>
                            <!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( $query1->have_posts() ) : $query1->the_post();

								/*
								* Include the Post-Format-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Format name) and that will be used instead.
								*/
								get_template_part( 'template-parts/post-item', get_post_format() );

							endwhile;

							?>
							<div class="pagination ui centered grid">
							<?php
							$big = 999999999; // need an unlikely integer
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'prev_text' => 'Sebelumnya',
								'next_text' => 'Selanjutnya',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $query1->max_num_pages
							) );
							?>
							</div>
							<?php

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
