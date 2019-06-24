<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form method="get" class="search-widget search-header" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="text" id="s" class="form-control"  placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" onblur="if (this.value == '')  {this.value = '<?php echo $search_text; ?>';}"  
    onfocus="if (this.value == '<?php echo $search_text; ?>') {this.value = '';}" />
<button type="submit"><i class="fa fa-search"></i></button>
<input type="hidden" name="post_type" value="product" />
</form>
