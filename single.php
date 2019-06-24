<?php get_header(); ?>
<div class="space60"></div>
<!-- BLOG CONTENT -->
<div class="blog-content">
<div class="container">
<div class="row">	          
    <div class="col-md-9 col-md-push-3 blog-content">
    <!-- BREADCRUMBS -->
    <div class="bcrumbs">
    <div class="container">
        <ul>
            <li><a href="#">Home</a></li>
            <li>Blog</li>
        </ul>
    </div>
    </div>
    <div class="blog-single">
        <article class="blogpost">   
			 <?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>    
               <h2 class="post-title"><?php the_title(); ?></h2> 
               <div class="space30"></div>
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-featured-thumb'); ?>
                <?php if(has_post_thumbnail()): ?>
                <img class="img-responsive img-rounded img-post " src="<?php echo $image[0]; ?>"/>  
                <div class="space20"></div>      
                <?php else: ?>
                <?php endif; ?>
            	<?php the_content()?>
           <div class="edit"> <?php edit_post_link('Edit this entry', '<p>', '</p>'); ?></div>
           <div class=" clearfix"></div>
            <?php }} ?>
              
             <div id="comments">
            <?php comments_template(); ?>
        </div>
        </article>
    </div>
    <div class="space30"></div>
    </div>   
    <?php get_sidebar(); ?> 
</div>
</div>
</div>
<div class="clearfix space60"></div>

<?php get_footer(); ?>