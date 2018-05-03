<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package _s
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function _s_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', '_s_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function _s_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', '_s_pingback_header' );


/**
 * Modified Archive title with just show the category name
 */
function _s_get_the_archive_title( $title ) {

	if( is_category() ) {

		$title = single_cat_title( '', false );

	}

	return $title;	
}

add_filter( 'get_the_archive_title', _s_get_the_archive_title);

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

add_filter('show_admin_bar', '__return_false');

/**
 * Get the article thumbnail url
 */
function get_article_thumbnail_src($id, $size = 'thumbnail') {
	$thumb_id = get_post_thumbnail_id($id);
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, $size, true);
	$thumb_url = $thumb_url_array[0];

	$imgSrc = $thumb_id == null ? get_template_directory_uri(). '/img/noimage.png' : $thumb_url;

	return $imgSrc;
}

/** Display image with caption */
function display_image_and_caption() {
	echo '<div class="post-featured-image">';
	the_post_thumbnail();
	$excerpt = get_post( get_post_thumbnail_id() )->post_excerpt;
	if(trim($excerpt) !== '') {
		echo '<div class="post-thumbnail-caption">' . $excerpt . '</div>';
	}
	echo '</div>';
}