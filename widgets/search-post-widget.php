<?php
/* Sidebar Post List Widget */

// create category list widget
class s_Search_Post_Widget extends WP_Widget {

  // php classnames and widget name/description added
  function __construct() {
    $widget_options = array(
      'classname' => 's_Search_Post_Widget',
      'description' => 'Add a nicely search posts to your sidebar.'
    );
    parent::__construct( 
      's_Search_Post_Widget', 
      'Search Post Widget', 
      $widget_options 
    );
  }

  // create the widget output
  function widget( $args, $instance ) {
    
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $color = $instance['color'];

    $headColor = $color != null ? 'style="background:'.$color.'"' : '';
    $beforeTitle = '<div class="head ui grid" '.$headColor.'>';
    $afterTitle = ' </div>';
    $titleContent= '<h3>'.$title.'</h3>';

    echo $args['before_widget'] . $beforeTitle . $titleContent . $afterTitle;
    
    ?>
    <div class="search-widget ui grid">
        <form role="search" method="get" class="search-form" action="<?php echo site_url();?>">
            <label>
                <span class="screen-reader-text">Cari untuk:</span>
                <input class="search-field" placeholder="Cari …" value="" name="s" type="search">
            </label>
            <input class="search-submit" value="Cari" type="submit">
        </form>
    </div>
    <?php

    echo $args['after_widget'];

    }
  
    function form( $instance ) { 
      $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
      $color = ! empty( $instance['color'] ) ? $instance['color'] : null;
      ?>
      <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
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
      $instance[ 'color' ] = $new_instance[ 'color' ];
      return $instance;
    }
  }
  