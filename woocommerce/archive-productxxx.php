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

//woocommerce_product_loop_end();
?>
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
</div>
</div>
<div class="clearfix space60"></div>
<?php
get_footer( 'shop' );
