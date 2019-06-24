<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package ultrabootstrap
 */
get_header(); ?>

<div class="space60"></div>
<!-- BLOG CONTENT -->
<div class="blog-content">
<div class="container">
<div class="row">
	<?php get_sidebar(); ?>           
    <div class="col-md-9 col-sm-8 blog-content">
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
        
        

<h2 class="post-title text-center">
<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ultrabootstrap' ); ?>
</h2>

<div class="<?php echo $class;?> detail-content">
<div class="not-found">
<p class="text-center"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ultrabootstrap' ); ?></p>
<?php get_search_form(); ?>
</div>
</div>
        </article>
    </div>
    <div class="space30"></div>
    </div>
</div>
</div>
</div>
<div class="clearfix space60"></div>

<?php get_footer(); ?>