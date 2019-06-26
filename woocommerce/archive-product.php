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

<<<<<<< HEAD
get_header();
?>
<div class="space60"></div>
<!-- BLOG CONTENT -->
<div class="blog-content">
<div class="container">
<div class="row">
	<!--?php get_sidebar(); ?-->

    <div class="col-md-9 col-md-push-3 blog-content">
<!-- BREADCRUMBS -->
<div class="bcrumbs">
       <?php woocommerce_breadcrumb(); ?>
</div>

<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title post-title"><?php woocommerce_page_title(); ?></h1>
<div class="space30"></div>
<?php endif; ?>

<div class="filter-wrap">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <!-- View as: <span><a class="active">Grid</a> / <a href="./categories-list.html">List</a></span> -->
						<?php woocommerce_catalog_ordering(); ?>
        </div>
        <div class="col-md-4 col-sm-4">
							<?php ps_selectbox();?>
        </div>
    </div>
</div>

<div class="space30"></div>
<div class="row">
<?php
//woocommerce_product_loop_start();

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
=======
get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
>>>>>>> 58dfd44e23540279498e68b4c41bcdd2e33a789d

//woocommerce_product_loop_end();
?>
<<<<<<< HEAD
</div>
                            <div class="pagenav-wrap">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        Results: <span>1 - 9 of 86 items</span>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="pull-right">
                                            <em>Page:</em>
                                            <ul class="page_nav">
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

    <div class="space30"></div>
    </div>
    <?php woocommerce_get_sidebar(); ?>
</div>
=======
<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

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
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );
?>
<div class="space60"></div>
<!-- BLOG CONTENT -->
<div class="blog-content">
<div class="container">
<div class="row">
	<!--?php get_sidebar(); ?-->

    <div class="col-md-9 col-md-push-3 blog-content">
<!-- BREADCRUMBS -->
<div class="bcrumbs">
       <?php woocommerce_breadcrumb(); ?>
</div>

<header class="woocommerce-products-header">
	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title post-title"><?php woocommerce_page_title(); ?></h1>
<div class="space30"></div>
<?php endif; ?>

<div class="filter-wrap">
    <div class="row">
        <div class="col-md-8 col-sm-8">
            <!-- View as: <span><a class="active">Grid</a> / <a href="./categories-list.html">List</a></span> -->
						Sort by:
						<?php woocommerce_catalog_ordering(); ?>
        </div>
        <div class="col-md-4 col-sm-4">
            <span class="pull-right">
                Show:
                <select>
                    <option>9 items</option>
                    <option>18 items</option>
                    <option>27 items</option>
                    <option>50 items</option>
                </select>
            </span>
        </div>
    </div>
</div>

<div class="space30"></div>
<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                <span class="badge new">New</span>
                <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>

            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                <span class="badge offer">-50%</span>
                <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>

            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>

            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
              <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>

            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>
                <div class="overlay-rmore fa fa-search quickview" data-toggle="modal" data-target="#myModal"></div>

            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
               <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>

            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
               <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>

            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="product-item">
            <div class="item-thumb">
                 <img src="<?php bloginfo("template_url"); ?>/images/products/fashion/9.jpg" class="img-responsive" alt=""/>

            </div>
            <div class="product-info">
                <h4 class="product-title"><a href="./single-product.html">Product fashion</a></h4>
                <span class="product-price">$99.00 <em>- Pre order</em></span>

            </div>
        </div>
    </div>
</div>
                            <div class="pagenav-wrap">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        Results: <span>1 - 9 of 86 items</span>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="pull-right">
                                            <em>Page:</em>
                                            <ul class="page_nav">
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

    <div class="space30"></div>
    </div>
    <?php woocommerce_get_sideba(); ?>
</div>
>>>>>>> 58dfd44e23540279498e68b4c41bcdd2e33a789d
</div>
</div>
<div class="clearfix space60"></div>
<?php
get_footer( 'shop' );
