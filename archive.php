<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();

$catImages = CATEGORY_IMAGES;
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="ui grid">	
			<?php
				if($cat != null) {
					$catTerm = get_term_by('id', $cat, 'category');
					$catSlug = $catTerm->slug;
					if(array_key_exists($catSlug,$catImages)):
						$catImgSrc = get_template_directory_uri().'/img/'.$catImages[$catSlug]['image'];
						$catImgLink = $catImages[$catSlug]['link'];
						?>
						<div class="row">
							<div class="column">
								<a target="_blank" href="<?php echo $catImgLink;?>"><img src="<?php echo $catImgSrc;?>" alt="" /></a>
							</div>
						</div>
					<?php endif;
				}					
			?>
				<div class="row">
					<!-- left column -->
					<div class="sixteen wide mobile eleven wide computer column">
						<div class="ui grid">
						<?php
						if ( have_posts() ) : ?>

							<div class="sixteen wide column">
								<?php
									the_archive_title( '<h3 class="news-list-title">', '</h3>' );
								?>
							</div>

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
							
							?>
							<div class="sixteen wide column">
								<div class="pagination ui centered grid">
									<div>
									<?php
									$big = 999999999; // need an unlikely integer
									echo paginate_links( array(
										'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
										'format' => '?paged=%#%',
										'prev_text' => 'Sebelumnya',
										'next_text' => 'Selanjutnya',
										'current' => max( 1, get_query_var('paged') ),
										'total' => $wp_query->max_num_pages
									) );
									?>
									</div>
								</div>
							</div>
							<?php
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
						</div>
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
