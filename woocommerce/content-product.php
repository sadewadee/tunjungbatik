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
    <?php
         if(is_front_page() ){ 
    echo '<div class="col-md-3 col-sm-6">';  }
    else{
    echo '<div class="col-md-4 col-sm-6">';  }    
    ?>
        <div class="product-item">
        <div <?php wc_product_class( '', $product ); ?>>
            <div class="item-thumb">
                <span class="badge"><?php woocommerce_show_product_loop_sale_flash();?></span>
                <?php woocommerce_template_loop_product_thumbnail();?>    
            </div>
            <div class="product-info">
            <?php 	do_action( 'woocommerce_before_shop_loop_item' );?>
                <h4 class="product-title"><?php woocommerce_template_loop_product_title(); ?></a></h4>
                <?php do_action('woocommerce_after_shop_loop_item_title');?> -    
   				<em><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></em>
            </div>
            </div>
        </div>
    </div>

