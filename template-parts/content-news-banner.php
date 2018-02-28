<?php
/**
 * Template part for displaying news banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<!-- Banner Item -->
<a href="<?php the_permalink();?>" class="banner-item">
    <div class="banner-image">
        <img class="news-thumb"  src="<?php echo get_article_thumbnail_src($post->ID, 'full');?>" alt="" />
    </div>
    <div class="banner-text">
        <p><?php the_title();?></p>
        <p class="banner-date"><?php echo date_i18n('j/m/Y - H:i', get_the_date('U') ); ?></p>
    </div>
</a>
<!-- Banner Item End -->
