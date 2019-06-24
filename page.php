<?php get_header(); ?>
<div class="space60"></div>
<!-- BLOG CONTENT -->
<div class="blog-content">
<div class="container">
<div class="row">	         
<div class="col-md-9 col-md-push-3  blog-content">
<!-- BREADCRUMBS -->
<div class="bcrumbs">
       <?php the_breadcrumb(); ?>
</div>

    <div class="blog-single">
        <article class="blogpost">      
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h2 class="post-title"><?php the_title(); ?></h2>   
            <div class="space30"></div>
            <?php the_content(); ?>
            <div class="edit"> <?php edit_post_link('Edit this entry', '<p>', '</p>'); ?></div>
            <?php endwhile; endif; ?>  
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