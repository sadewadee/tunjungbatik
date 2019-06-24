<!-- Slider 1 -->
<div class="slider" id="slider3">
<?php $slideshow_home = ( array(  'posts_per_page' => '5','post_type' => 'slideshow_home' )); query_posts( $slideshow_home ); ?>
<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slideshow_home' );?>
<div style="background-image: url('<?php echo $thumb['0'];?>')">
<span>
<h2><?php the_title(); ?></h2>
<!--?php echo string_limit_words(get_the_excerpt(), 30); ?-->
</span>
</div>
<!-- The Arrows -->
<i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path></svg></i>
<i class="right" class="arrows" style="z-index:2; position:absolute;">
<svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path></svg></i> 
<?php endwhile; ?>
<?php endif; ?>
<?php  wp_reset_query(); ?>    
</div>