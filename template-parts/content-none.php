<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ultrabootstrap
 */

?>

<section class="page-not-found" >
    <div class="row">

    	<div class="col-sm-12">
      	<h1 class="text-center">
      		<?php esc_html_e( 'Nothing Found.', 'ultrabootstrap' ); ?>
      	</h1>
    	</div> <!-- /.end of col 12 -->

    	<div class="col-sm-12">
      	<div class="not-found">
		        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			        <p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ultrabootstrap' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		        <?php elseif ( is_search()) : ?>

			        <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ultrabootstrap' ); ?></p>
			      <?php //get_search_form(); ?>

		        <?php else : ?>

			        <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ultrabootstrap' ); ?></p>
			      <?php //get_search_form(); ?>

		        <?php endif; ?>
	      </div> <!-- /.end of not-found -->
    	</div> <!-- /.end of col 12 -->
        
    </div> <!-- /.end of row -->
  </section> <!-- /.end of section -->

<div class="clear-both"></div> 