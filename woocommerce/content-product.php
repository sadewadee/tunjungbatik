<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<<<<<<< HEAD
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<div class="col-md-4 col-sm-6" <?php wc_product_class( '', $product ); ?>>
			<div class="product-item">
					<div class="item-thumb">
						<?php
						$img = get_the_post_thumbnail_url($loop->post->ID);
						$src = 'http://localhost/batik/wp-content/uploads/woocommerce-placeholder.png';
						if(!empty($img)){ ?>
						<img src="<?php echo $img ?>" class="img-responsive" alt=""/>
					<?php } else { ?>
						<img src="<?php echo $src ?>" class="img-responsive" alt=""/>
					<?php } ?>
					</div>
					<div class="product-info">
							<h4 class="product-title"><?php do_action( 'woocommerce_shop_loop_item_title' ); ?></h4>
							<span class="product-price"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?><em>-<?php do_action( 'woocommerce_after_shop_loop_item' );?></em></span>

					</div>
			</div>
	</div>
=======
<li <?php wc_product_class( '', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
>>>>>>> 58dfd44e23540279498e68b4c41bcdd2e33a789d
