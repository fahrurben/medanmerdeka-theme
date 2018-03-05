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
    $popular = $instance['popular'];
    $color = $instance['color'];

    // Get the ID of a given category
    $category_id = get_cat_ID( $category );
    $category_link = get_category_link( $category_id );
    $category_button = ' <a href="'.$category_link.'" class="more"></a>';

    $headColor = $color != null ? 'style="background:'.$color.'"' : '';
    $beforeTitle = '<div class="head ui grid" '.$headColor.'>';
    $afterTitle = $popular != null  && $popular != '' ? ' </div>' : $category_button.'</div>';
    $titleContent= '<h3>'.$title.'</h3>';

    echo $args['before_widget'] . $beforeTitle . $titleContent . $afterTitle;
    

    $args = array('post_type' => 'post');

    if($category != null && $category != '') {
        $args['category_name'] = $category; 
    }

    if($max != null && $max != '') {
        $args['posts_per_page'] = $max; 
    }

    if($popular != null && $popular != '') {
      $args['orderby'] = 'post_views'; 
      $args['order'] = 'DESC';
      $args['date_query'] = array(
        array(
          'column' => 'post_date_gmt',
          'after'  => '1 days ago',
        )
      );
    }


    // the query
    $the_query = new WP_Query( $args ); ?>
    <?php if ( $the_query->have_posts() ) : ?>

        <!-- News list -->
        <div class="news-list ui grid">

        <!-- the loop -->
        <?php 
        $i = 0;
        while ( $the_query->have_posts() ) : 
          $the_query->the_post();
          
          if($i > 0) :
        ?>
            <!-- News Item Small -->
            <div class="news-item small row">
                <a href="<?php the_permalink(); ?>" class="five wide column news-item-thumb">
                    <img src="<?php echo get_article_thumbnail_src($post->ID);?>" alt="" />
                </a>
                <div class="eleven wide column news-item-box">
                  <div class="news-item-content ui grid">
                    <a href="<?php the_permalink(); ?>" class="news-item-title"><?php the_title();?></a>
                    <div class="news-item-date">
                        <a href="<?php echo get_category_link( get_the_category()[0]->term_id );?>" class="category">
                          <?php echo get_the_category()[0]->cat_name;?>
                        </a>
                        <span class="date"><?php echo date_i18n('j/m/Y', get_the_date('U') ); ?></span>
                    </div>
                  </div>
                </div>
            </div>	
            <!-- News Item Small End -->
        <?php 
          else :  
        ?> 
          <!-- News Item Small -->
          <div class="news-item small row">
              <a href="<?php the_permalink(); ?>" class="sixteen wide column news-item-full-thumb">
                  <img src="<?php echo get_article_thumbnail_src($post->ID, 'medium');?>" alt="" />
              </a>
              <div class="sixteen wide column news-item-box">
                <div class="news-item-content">
                  <a href="<?php the_permalink(); ?>" class="news-item-title"><?php the_title();?></a>
                </div>
              </div>
          </div>	
          <!-- News Item Small End -->         
        <?php 
          endif;

          $i++;
        endwhile; 
        ?>
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
      $popular = ! empty( $instance['popular'] ) ? $instance['popular'] : null;  
      $popularChecked = $popular != null ? ' checked' : '';
      $color = ! empty( $instance['color'] ) ? $instance['color'] : null;
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
      <p>
        <label for="<?php echo $this->get_field_id( 'popular' ); ?>">Terpopuler:</label>
        <input type="checkbox" id="<?php echo $this->get_field_id( 'popular' ); ?>" name="<?php echo $this->get_field_name( 'popular' ); ?>" value="true" <?php echo $popularChecked;?>/>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'color' ); ?>">Terpopuler:</label>
        <input type="color" id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" value="<?php echo $color; ?>" />
      </p>
      <p>This widget displays all of your post categories as a two-column list (or a one-column list when rendered responsively).</p>
    <?php }
  
    // Update database with new info
    function update( $new_instance, $old_instance ) { 
      $instance = $old_instance;
      $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
      $instance[ 'category' ] = $new_instance[ 'category' ];
      $instance[ 'max' ] = $new_instance[ 'max' ];
      $instance[ 'popular' ] = $new_instance[ 'popular' ];
      $instance[ 'color' ] = $new_instance[ 'color' ];
      return $instance;
    }
  }
  
  
  // register the widget
  function s_register_widgets() { 
    register_widget( 's_Post_List_Widget' );
  }
  add_action( 'widgets_init', 's_register_widgets' );
  
  ?>          