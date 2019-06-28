<?php

remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
function woocommerce_pagination() {
        wp_pagenavi();
    }
add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);

add_action( 'init', 'custom_fix_thumbnail' );

function custom_fix_thumbnail() {
    add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');

    function custom_woocommerce_placeholder_img_src( $src ) {
        $src = get_template_directory_uri().'/images/products/single/3.jpg';

        return $src;
    }
}
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


function remove_menus(){
$current_user = wp_get_current_user();
if( !current_user_can('administrator') || $current_user->user_login!='baliorange') {
  //remove_menu_page( 'index.php' );                  //Dashboard
  //remove_menu_page( 'jetpack' );                    //Jetpack*
  //remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  //remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'plugins.php' );                //Plugins
  //remove_menu_page( 'options-general.php' );        //Settings

  remove_menu_page( 'users.php' );                  //Users
  remove_submenu_page( 'themes.php','theme-editor.php');
  if ( !empty ( $GLOBALS['admin_page_hooks']['woocommerce'] ) ) :
              remove_submenu_page( 'woocommerce', 'wc-settings' ); //WOO
       remove_submenu_page( 'woocommerce', 'wc-addons' ); //WOO
              remove_submenu_page( 'woocommerce', 'wc-status' ); //WOO
       endif;
       }
}
// /add_action( 'admin_menu', 'remove_menus',999 );

function wooc_extra_register_fields() {?>
       <p class="form-row form-row-first">
       <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
       </p>
       <p class="form-row form-row-last">
       <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
       </p>
       <!--<p class="form-row form-row-wide">
       <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
       <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" />
       </p>-->
       <div class="clear"></div>
       <?php
 }
add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );
//change menu name
add_filter( 'wp_nav_menu_items', 'dynamic_label_change', 10, 2 );
function dynamic_label_change( $items, $args ) { if (!is_user_logged_in() && $args->theme_location == 'shop') { $items = str_replace("My account", "Login", $items); } return $items; }
add_filter( 'wp_nav_menu_items', 'dynamics_label_change', 10, 2 );
function dynamics_label_change( $items, $args ) { if ($args->theme_location == 'primary') { $items = str_replace("Cek Resi", "", $items); } return $items; }
remove_action( 
    'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 25 );
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 20,0);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 20,0);


//delete menu
$menu_name   = 451;//name,id,slug
wp_delete_nav_menu($menu_name);
  
function current_paged( $var = '' ) {
    if( empty( $var ) ) {
        global $wp_query;
        if( !isset( $wp_query->max_num_pages ) )
            return;
        $pages = $wp_query->max_num_pages;
    }
    else {
        global $$var;
            if( !is_a( $$var, 'WP_Query' ) )
                return;
        if( !isset( $$var->max_num_pages ) || !isset( $$var ) )
            return;
        $pages = absint( $$var->max_num_pages );
    }
    if( $pages < 1 )
        return;
    $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    echo $page;
}

add_filter( 'woocommerce_sale_flash', 'sale_text', 10, 3 );
function sale_text( $text, $post, $product ) {
  $text = '';
  if($product->product_type != 'grouped'){
    $text .= '<span class="badge onsale">';

    $regular = $product->regular_price;
    $sale = $product->sale_price;

	if($product->product_type == 'variable') {
	$available_variations = $product->get_available_variations();
	$variation_id=$available_variations[0]['variation_id'];
	$variable_product1= new WC_Product_Variation( $variation_id );

	$regular_var = $variable_product1 ->regular_price;
	$sales_var = $variable_product1 ->sale_price;
    $discount = floor( ( ($regular_var - $sales_var) / $regular_var ) * 100 );
	


  }elseif( isset( $sale ) ) {

    	if(!empty($regular && $sale))
        {
        	$discount = floor( ( ($regular - $sale) / $regular ) * 100 );
        }
    }else{ $discount = 0; }

    $text .= $discount . '%';

    $text .= '</span>';
  }
    return $text;

}

add_action("template_redirect", 'redirection_function');
function redirection_function(){
    global $woocommerce;
    if( is_cart() && WC()->cart->cart_contents_count == 0){
        //wp_safe_redirect( get_permalink( woocommerce_get_page_id( 'cart' ) ) );
    }
}

function my_woocommerce_catalog_orderby( $orderby ) {
    unset($orderby['popularity']);
    return $orderby;
}
//add_filter( 'woocommerce_catalog_orderby', 'my_woocommerce_catalog_orderby', 20 );

//add_filter('woocommerce_catalog_orderby', 'wc_customize_product_sorting');

function wc_customize_product_sorting($sorting_options){
    $sorting_options = array(
        'menu_order' => __( 'Sorting', 'woocommerce' ),
        'popularity' => __( 'Popularity', 'woocommerce' ),
        'rating'     => __( 'Average rating', 'woocommerce' ),
        'date'       => __( 'Newness', 'woocommerce' ),
        'price'      => __( 'Low to high', 'woocommerce' ),
        'price-desc' => __( 'High to low', 'woocommerce' ),
    );

    return $sorting_options;
}

add_filter( 'wp_get_attachment_image_attributes', 'remove_image_text');
function remove_image_text( $attr ) {
unset($attr['title']);
return $attr;
}

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

// Adding Meta container admin shop_order pages
add_action( 'add_meta_boxes', 'mv_add_meta_boxes' );
if ( ! function_exists( 'mv_add_meta_boxes' ) )
{
    function mv_add_meta_boxes()
    {
        add_meta_box( 'mv_other_fields', __('Input No. Resi','woocommerce'), 'tatepoo_add_resi', 'shop_order', 'side', 'core' );
    }
}

// Adding Meta field in the meta container admin shop_order pages
if ( ! function_exists( 'tatepoo_add_resi' ) )
{
    function tatepoo_add_resi()
    {
        global $post;

        $meta_field_data = get_post_meta( $post->ID, 'resi', true ) ? get_post_meta( $post->ID, 'resi', true ) : '';

        echo '<input type="hidden" name="mv_other_meta_field_nonce" value="' . wp_create_nonce() . '">
        <p style="border-bottom:solid 1px #eee;padding-bottom:13px;">
            <input type="text" style="width:250px;";" name="resi" placeholder="' . $meta_field_data . '" value="' . $meta_field_data . '"></p>';

    }
}

// Save the data of the Meta field
add_action( 'save_post', 'mv_save_wc_order_other_fields', 10, 1 );
if ( ! function_exists( 'mv_save_wc_order_other_fields' ) )
{

    function mv_save_wc_order_other_fields( $post_id ) {

        // We need to verify this with the proper authorization (security stuff).

        // Check if our nonce is set.
        if ( ! isset( $_POST[ 'mv_other_meta_field_nonce' ] ) ) {
            return $post_id;
        }
        $nonce = $_REQUEST[ 'mv_other_meta_field_nonce' ];

        //Verify that the nonce is valid.
        if ( ! wp_verify_nonce( $nonce ) ) {
            return $post_id;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }

        // Check the user's permissions.
        if ( 'page' == $_POST[ 'post_type' ] ) {

            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {

            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }
        // --- Its safe for us to save the data ! --- //

        // Sanitize user input  and update the meta field in the database.
        update_post_meta( $post_id, 'resi', $_POST[ 'resi' ] );
    }
}

//password streng
function woo_password_strength( $strength ) {
    return 2;
}
add_filter( 'woocommerce_min_password_strength', 'woo_password_strength', 10, 1 );


//adding mail field
//add_filter( 'woocommerce_email_order_meta_fields', 'custom_woocommerce_email_order_meta_fields', 10, 3 );
function custom_woocommerce_email_order_meta_fields( $fields, $sent_to_admin, $order ) {
global $woocommerce, $post;
$order = new WC_Order($post->ID);

echo $order->get_id();
	$no_resi = get_post_meta( $order->get_id(), 'resi', true );
	if($no_resi)
    $fields['meta_key'] = array(
        'label' => __( 'Tracking Number ' ),
        'value' => $no_resi,
    );
    return $fields;
}

function woocommerce_subcats_from_parentcat_by_ID($parent_cat_ID) {

   $args = array(

       'hierarchical' => 1,

       'show_option_none' => '',

       'hide_empty' => 0,

       'parent' => $parent_cat_ID,

     'taxonomy' => 'product_cat'

   );

$subcats = get_categories($args);

echo '<ul class="wooc_sclist">';

foreach ($subcats as $sc) {

       $link = get_term_link( $sc->slug, $sc->taxonomy );

echo '<li><a href="'. $link .'">'.$sc->name.'</a></li>';

     }

echo '</ul>';

}

//add_action( 'login_redirect', 'custom_login_redirect' );
function custom_login_redirect()
{
    if ( 'wp-login.php' == $GLOBALS['pagenow'] )
    {
        // Set your $login_page_id
        wp_redirect( get_permalink(wc_get_page_id('my-account')) );
        die;
    }
}

// This will replace the login url used by Wordpress
//add_filter( 'login_url', 'custom_login_url', 10, 2 );
function custom_login_url( $login_url='', $redirect='' )
{
    // Set your $login_page_id
    return wp_redirect( get_permalink(wc_get_page_id('my-account')) );
}

add_filter('password_hint', 'change_password_hint');
function change_password_hint($hint) {
  return 'Hint: The password should be at least 8 characters longer. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & ).[]';
}

function change_menu($items){
  foreach($items as $item){
    if( $item->title == "Logout"){
         $item->url = $item->url . "&_wpnonce=" . wp_create_nonce( 'log-out' );
    }
  }
  return $items;

}
add_filter('wp_nav_menu_objects', 'change_menu');

add_action( 'woocommerce_before_shop_loop', 'ps_selectbox', 40 );
function ps_selectbox() {
    $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
    echo '<span class="pull-right"> Show items : ';
    echo '<select onchange="if (this.value) window.location.href=this.value">';
    $orderby_options = array(
        '6' => '6',
        '9' => '9',
        '12' => '12'
    );
    foreach( $orderby_options as $value => $label ) {
        echo "<option ".selected( $per_page, $value )." value='?perpage=$value'>$label items</option>";
    }
    echo '</select>';
    echo '</span>';
}

add_action( 'pre_get_posts', 'ps_pre_get_products_query' );
function ps_pre_get_products_query( $query ) {
   $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
   if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'product' ) ){
        $query->set( 'posts_per_page', $per_page );
    }
}

function woocommerce_slider()
{
global $product;
$attachment_ids = $product->get_gallery_attachment_ids();
?>
<div class="owl-carousel prod-slider sync1">
<?php
  foreach( $attachment_ids as $attachment_id ) {
      $image_link = wp_get_attachment_image_src( $attachment_id, 'slider_product' )[0]; ?>
        <div class="item">
          <?php if (!empty($image_link)) : ?>
          <img src="<?php  echo $image_link; ?>">
          <a href="<?php  echo $image_link; ?>" rel="prettyPhoto[gallery2]" title="Product" class="caption-link"><i class="fa fa-arrows-alt"></i></a>
          <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/products/single/2.jpg" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" />
          <?php endif; ?>
</div>
      <?php
  }
  ?>
</div>
<div  class="owl-carousel sync2">
<?php
  foreach( $attachment_ids as $attachment_id ) {
      $image_link = wp_get_attachment_image_src( $attachment_id, 'slider_product' )[0]; ?>
        <div class="item">
          <?php if (!empty($image_link)) : ?>
<div class="item"> <img src="<?php  echo $image_link; ?>" alt=""> </div>
          <?php else : ?>
<div class="item"> <img src="<?php bloginfo("template_url"); ?>/images/products/single/1.jpg" alt=""> </div>
          <?php endif; ?>
</div>
      <?php
  }
  ?>
</div>
  <?php
}

add_action( 'woocommerce_before_single_product', 'check_if_variable_first' );
function check_if_variable_first(){
    if ( is_product() ) {
        global $post;
        $product = wc_get_product( $post->ID );
        if ( $product->is_type( 'variable' ) ) {
            // removing the price of variable products
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
 
// Change location of
add_action( 'woocommerce_single_product_summary', 'custom_wc_template_single_price', 10 );
function custom_wc_template_single_price(){
    global $product;
 
// Variable product only
if($product->is_type('variable')):
 
    // Main Price
    $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
    $price = $prices[0] !== $prices[1] ? sprintf( __( 'From: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
    // Sale Price
    $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
    sort( $prices );
    $saleprice = $prices[0] !== $prices[1] ? sprintf( __( 'From: %1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
    if ( $price !== $saleprice && $product->is_on_sale() ) {
        $price = '<del>' . $saleprice . $product->get_price_suffix() . '</del> <ins>' . $price . $product->get_price_suffix() . '</ins>';
    }
 
    ?>
    <style>
        div.woocommerce-variation-price,
        div.woocommerce-variation-availability,
        div.hidden-variable-price {
            height: 0px !important;
            overflow:hidden;
            position:relative;
            line-height: 0px !important;
            font-size: 0% !important;
        }
    </style>
    <script>
    jQuery(document).ready(function($) {
        $('select').blur( function(){
            if( '' != $('input.variation_id').val() ){
                $('p.price').html($('div.woocommerce-variation-price > span.price').html()).append('<p class="availability">'+$('div.woocommerce-variation-availability').html()+'</p>');
                console.log($('input.variation_id').val());
            } else {
                $('p.price').html($('div.hidden-variable-price').html());
                if($('p.availability'))
                    $('p.availability').remove();
                console.log('NULL');
            }
        });
    });
    </script>
    <?php
 
    echo '<p class="price">'.$price.'</p>
   <div class="hidden-variable-price" >'.$price.'</div>';
 
endif;
}
 
        }
    }
}

function wpsites_query( $query ) {
if ( $query->is_front_page()) {
        $query->set( 'posts_per_page', 6 );
    }
}
add_action( 'pre_get_posts', 'wpsites_query' );