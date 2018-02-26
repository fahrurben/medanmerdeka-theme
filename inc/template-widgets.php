<?php
/* Sidebar Post List Widget */

// create category list widget
class s_Post_List_Widget extends WP_Widget {

  // php classnames and widget name/description added
  function __construct() {
    $widget_options = array(
      'classname' => 's_post_list_widget',
      'description' => 'Add a nicely formatted list of categories to your sidebar.'
    );
    parent::__construct( 
      's_Post_list_widget', 
      'Post Listing Widget', 
      $widget_options 
    );
  }

  // create the widget output
  function widget( $args, $instance ) {
    
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $category = $instance['category'];
    $max = $instance['max'];

    $beforeTitle = '<div><h3 class="news-list-title">';
    $afterTitle = '</h3></div>';    

    echo $args['before_widget'] . $beforeTitle . $title . $afterTitle;
    

    $args = array('post_type' => 'post');

    if($category != null && $category != '') {
        $args['category_name'] = $category; 
    }

    if($max != null && $max != '') {
        $args['posts_per_page'] = $max; 
    }


    // the query
    $the_query = new WP_Query( $args ); ?>
    <?php if ( $the_query->have_posts() ) : ?>

        <!-- News list -->
        <div class="news-list ui grid">

        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <!-- News Item Small -->
            <a href="<?php the_permalink(); ?>" class="news-item small row">
                <div class="six wide column news-item-thumb">
                    <img src="<?php echo get_article_thumbnail_src($post->ID);?>" alt="" />
                </div>
                <div class="ten wide column news-item-box">
                    <p class="news-item-title"><?php the_title();?></p>
                    <p class="news-item-date">
                        <span class="category"><?php echo get_the_category()[0]->cat_name;?></span>
                        <span class="date"><?php echo date_i18n('j/m/Y', get_the_date('U') ); ?></span>
                    </p>
                </div>
            </a>	
            <!-- News Item Small End -->
        <?php endwhile; ?>
        <!-- end of the loop -->

        </div>
        <!-- News list end -->

        <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?><?php
            echo $args['after_widget'];
    }
  
    function form( $instance ) { 
      $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
      $category = ! empty( $instance['category'] ) ? $instance['category'] : null;
      $max = ! empty( $instance['max'] ) ? $instance['max'] : 5;  
      ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'category' ); ?>">Category:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" value="<?php echo esc_attr( $category ); ?>" />
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'max' ); ?>">Max:</label>
        <input type="number" id="<?php echo $this->get_field_id( 'max' ); ?>" name="<?php echo $this->get_field_name( 'max' ); ?>" value="<?php echo esc_attr( $max ); ?>" />
      </p>
      <p>This widget displays all of your post categories as a two-column list (or a one-column list when rendered responsively).</p>
    <?php }
  
    // Update database with new info
    function update( $new_instance, $old_instance ) { 
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'category' ] = $new_instance[ 'category' ];
      $instance[ 'max' ] = $new_instance[ 'max' ];
      return $instance;
    }
  }
  
  
  // register the widget
  function s_register_widgets() { 
    register_widget( 's_Post_List_Widget' );
  }
  add_action( 'widgets_init', 's_register_widgets' );
  
  ?>          