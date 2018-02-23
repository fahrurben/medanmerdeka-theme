<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="ui container">
			<div class="ui grid">
				<div class="sixteen wide mobile six wide computer column">
					<a href="javascript:;" class="footer-logo">
						<img src="<?php echo get_template_directory_uri(). '/img/logo.jpg';?>" alt="" />	
					</a>
					<div class="comp-profile">
						<?php dynamic_sidebar( 'footer-contact-us' ); ?>	
					</div>
				</div>

				<div class="sixteen wide mobile five wide computer column">
					<?php dynamic_sidebar( 'footer-menu' ); ?>	
				</div>

				<div class="sixteen wide mobile five wide computer column">
					<?php dynamic_sidebar( 'footer-menu-contact' ); ?>	
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
