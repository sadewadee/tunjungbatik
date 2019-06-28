<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
if(is_front_page()){
?>
<?php get_template_part('inc/slider.php'); ?>
<div class="f-categories">
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
		<?php
        $the_query = new WP_Query( array( 'page_id' => 13 ) );
        if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
        $the_query->the_post();
        ?>  
            <div class="heading-sub text-center">
                <h1 class="title space20"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div> 
        <?php }} else { }?> 
        </div>
    </div>
</div>
</div>

<?php
}
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

     if(is_front_page()){ 
    echo '<div class="featured-products">
    <div class="container">
        <div class="row">
            <h2 class="heading title  text-center space20">Featured Products</h2>
            <hr />'; }
    else {
?>
<div class="space60"></div>
<!-- BLOG CONTENT -->
<div class="blog-content">
<div class="container">
<div class="row">
	<!--?php get_sidebar(); ?-->
    <?php
    echo '<div class="col-md-9 col-md-push-3 blog-content">';}
     	?>
<!-- BREADCRUMBS -->
<div class="bcrumbs">
       <?php woocommerce_breadcrumb(); ?>
</div>
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) && !is_front_page()) : ?>
		<h1 class="woocommerce-products-header__title page-title post-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>  
<div class="space30"></div>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	echo '<div class="filter-wrap">';
	do_action( 'woocommerce_before_shop_loop' );
	echo '</div>';
	echo '<div class="row">';
	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 *
			 * @hooked WC_Structured_Data::generate_product_data() - 10
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();
	echo '</row">';

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );
?>
                        
    <div class="space30"></div>
    </div>
    </div>
    <?php if(!is_front_page()){get_template_part('sidebar-woo');}?> 
</div>
</div>
</div>
<div class="clearfix space60"></div>
<?php
get_footer( 'shop' );
