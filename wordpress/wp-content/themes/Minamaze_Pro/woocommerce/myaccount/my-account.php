<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices(); ?>

<p class="myaccount_user">
	<?php
	printf(
		__( 'Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'minamaze' ) . ' ',
		$current_user->display_name,
		wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
	);

	printf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'minamaze' ),
		wc_customer_edit_account_url()
	);
	?>
</p>

<?php do_action( 'woocommerce_before_my_account' ); ?>

<div id="my-downloads" class="myaccount-tab tab-pane fade">
<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>
</div>

<div id="my-orders" class="myaccount-tab tab-pane fade active in">
<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>
</div>

<div id="my-address" class="myaccount-tab tab-pane fade">
<?php wc_get_template( 'myaccount/my-address.php' ); ?>
</div>

<?php do_action( 'woocommerce_after_my_account' ); ?>
