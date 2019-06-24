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
<div class="spacer index-welcome clearfix ">      
<?php if (have_posts()) : ?>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<?php } ?>

<h2 class="post-title title"><?php printf( esc_html__( 'Search Results for: %s', 'ultrabootstrap' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

<div class="space30"></div>
<?php while (have_posts()) : the_post(); ?>
<article class="blogpost">
<h3 class="post-title"><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php the_title(); ?></a></h3>
<div class="post-meta">
<span><a href="#"><i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?></a></span>
<span> <a href="#"><i class="fa fa-comments"></i> Posted in <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></a></span>
<span><a href="#"><i class="fa fa-folder"></i> <?php the_category(', ') ?> </a></span>
<!--span><a href="#"><i class="fa fa-user"></i><?php wp_list_authors(); ?></a></span-->
</div>
<div class="space20"></div>
<?php if (has_post_thumbnail()) : ?>
<div class="post-media"><?php the_post_thumbnail('full-featured-thumb', array('class' => 'img-responsive')); ?></div>
<?php else : ?>
<div class="post-media"><img src="<?php echo get_template_directory_uri(); ?>/images/no-blog-thumbnail.jpg" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" />  </div>
<?php endif; ?>        
<div class="space20"></div>
<div class="post-excerpt">
<p><?php echo string_limit_words(get_the_excerpt(), 100); ?></p>
</div>
<div clearfix></div>
<a href="<?php the_permalink(); ?>" class="btn-blue">Read More&nbsp;&nbsp;<i class="fa fa-angle-right"></i></a>   
</article>


<?php endwhile; ?>
<div class="navigation">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
<?php } ?>
</div>
<?php else : ?>

<div class="col-sm-12"><h2 class="pagetitle">No posts found. Try a different search ?</h2>
<?php get_search_form(); ?></div>
<?php endif; ?>

</div> 

</div>
    
<div class="space30"></div>
</div>
<?php get_sidebar(); ?>      
</div>
</div>
</div>
<div class="clearfix space60"></div>

<?php get_footer(); ?>