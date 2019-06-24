<?php if(has_post_thumbnail()): ?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slideshow_home' );?>
<div class="top-img" style="background-image: url('<?php echo $thumb['0'];?>')"></div>
<?php else: ?>
<div class="top-img" style="background-image: url(<?php bloginfo("template_url"); ?>/images/athena.jpg)"></div>
<?php endif; ?>