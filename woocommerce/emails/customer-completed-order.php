<?php

/**

 * Customer completed order email

 *

 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.

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



<p><?php printf( __( "Pesanan kamu 

telah berhasil di proses dan terkirim



<br>Pembayaran untuk pesanan kamu sudah kami terima dan pesanan dalam proses pengiriman saat ini. 



<br>Kamu tidak perlu menjawab email ini



<br>Berikut detail pesanan kamu dan no. resi pengirimannya", 'woocommerce' ), get_option( 'blogname' ) ); ?></p>



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

	$order_id = $order->get_id(); 
	$no_resi = get_post_meta( $order_id, 'resi', true );
	if ( !empty($no_resi)) : ?>
	<div style="margin-bottom: 20px;">
	<h2 class="color: #333333; display: block; font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif; font-size: 18px; font-weight: bold; line-height: 130%; margin: 0 0 18px; text-align: left;">Tracking Information</h2>
	<table class="td" style="width: 100%; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif; color: #5c5c5c; border: 1px solid #e5e5e5;" cellspacing="0" cellpadding="6" border="1">			
		<tr>
			<th class="td" scope="row" style="text-align: left; border-top-width: 4px; color: #5c5c5c; border: 1px solid #e5e5e5; padding: 12px;">Tracking Number(Nomor Resi): </th>
			<td class="td" style="text-align:<?php echo $text_align; ?>; vertical-align:middle; border: 1px solid #eee; font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;"><?php echo $no_resi; ?></td>
		</tr>
	</table>
</div>
	<?php endif; ?>
<?php

/**

 * @hooked WC_Emails::customer_details() Shows customer details

 * @hooked WC_Emails::email_address() Shows email address

 */

do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );



/**

 * @hooked WC_Emails::email_footer() Output the email footer

 */



?>

<center>

<i>Pertanyaan terkait pesanan? Silahkan hubungi kami di WA.082146471155 <br>( Senin - Jumat Pk.08.00-16.30 )

( Sabtu pk.08.00 - 13.00)</i>

<center/>

<?php

do_action( 'woocommerce_email_footer', $email );

