<?php
/**
 * Template part for displaying post item
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

?>

<!-- News Item -->
<a href="<?php the_permalink(); ?>" class="news-item row">
    <div class="six wide column">
        <img class="news-thumb"  src="<?php echo get_article_thumbnail_src($post->ID);?>" alt="" />
    </div>
    <div class="ten wide column news-item-box">
        <p class="news-item-title"><?php the_title();?></p>
        <p class="news-item-date">
            <span class="category"><?php echo get_the_category()[0]->cat_name;?></span>
            <span class="date"><?php echo date_i18n('j/m/Y - H:i', get_the_date('U') ); ?></span>
        </p>
    </div>
</a>
<!-- New Item End -->
