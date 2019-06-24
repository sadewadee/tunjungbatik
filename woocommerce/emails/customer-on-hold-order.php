<?php
/**
 * Customer on-hold order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-on-hold-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p><?php _e( "Harap segera melakukan pembayaran berikut sesuai total dibawah ini

dan jangan lupa konfirmasi pembayaran di website, atau bisa langsung klik tombol dibawah ini.

<br>Konfirmasi hanya bisa dilakukan di Website Tatephoo:", 'woocommerce' ); ?></p>

<?php

/**
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

?>
	<center>
		<a href="<?php echo get_permalink(get_page_by_title('Konfirmasi Pembayaran'))."?order_id=".$order->get_order_number();?>" class="confirm-button" style="padding: .5em 1em !important;font-size: 14px;font-weight: 400 !important;color: #515151 !important;background-color: #DFC89B!important;margin: 10px 0 10px !important;margin-bottom: 10px !important;text-transform: capitalize !important;text-decoration: none !important;">
		Confirm Order</a><br><br>
	

<i>Pertanyaan terkait pesanan? Silahkan hubungi kami di WA.082146471155 <br>( Senin - Jumat Pk.08.00-16.30 )
	( Sabtu pk.08.00 - 13.00)</i>
</center>
<?php
/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
