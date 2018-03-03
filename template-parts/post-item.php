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
<div class="news-item sixteen wide column">
    <div>
        <div class="ui grid">
            <a href="<?php the_permalink(); ?>" class="six wide column news-item-thumb">
                <img  src="<?php echo get_article_thumbnail_src($post->ID, 'medium');?>" alt="" />
            </a>
            <div class="ten wide column news-item-box">
                <div class="news-item-content ui grid">
                    <a href="<?php the_permalink(); ?>" class="news-item-title"><?php the_title();?></a>
                    <div class="news-item-date">
                        <a href="<?php echo get_category_link( get_the_category()[0]->term_id );?>" class="category">
                            <?php echo get_the_category()[0]->cat_name;?>
                        </a>
                        <span class="date"><?php echo date_i18n('j/m/Y - H:i', get_the_date('U') ); ?></span>
                    </div>
                    <div class="news-excerpt sixteen wide computer tablet only column">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- New Item End -->
