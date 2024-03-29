<?php /**  
* The template used for displaying page content in page.php  
*  
* @package ultrabootstrap  */
?>

<div class="page-title">
	<h1><?php the_title(); ?></h1>
</div>

<div class="single-post">
	<div class="post-content">

		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<figure>
				<?php the_post_thumbnail('full'); ?>
			</figure>
		<?php endif; ?>       

		<article>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ultrabootstrap' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</article> <!-- /.end of article -->
	</div>


</div>


<div class="entry-meta">
	<?php edit_post_link( __( 'Edit', 'ultrabootstrap' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-meta -->