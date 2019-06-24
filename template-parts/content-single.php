<?php
/**
 * Template part for displaying single posts.
 *
 * @package ultrabootstrap
 */

?>


  <div class="post-content">
      <?php the_content();?>
      <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ultrabootstrap' ),
          'after'  => '</div>',
        ) );
      ?>     
    </div>
